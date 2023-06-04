<?php

namespace controller;

use \model\Usuario;
use \model\Perfil;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Perfil.php");
require_once("../model/Utils.php");

$mensaje = "";

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nombre"])) {

    $usuario = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    //Segun los asignamos al array de datos del usuario a registrar
    $usuario["email"] = Utils::limpiar_datos($_POST["email"]);

    //Generamos una salt de 16 posiciones
    $salt = Utils::generar_salt(16, true);
    $usuario["salt"] = $salt;
    //Encriptamos el password del formulario con la funcion crypt
    $passEncript = crypt($_POST["password"], '$5$rounds=5000$' . $salt . '$');
    $passEncript = explode("$", $passEncript);

    $usuario["password"] = $passEncript[4];
    //Por defecto el usuario esta deshabilitado
    $usuario["activo"] = 0;
    //Generamos el codigo de activacion
    $usuario["codActivacion"] = Utils::generar_codigo_activacion();


    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Añadimos el registro
    $resultado = $gestorUsu->addUsuario($usuario, $conexPDO);



    // Saco el id del usuario recién registrado

    $usuarioRegistrado = $gestorUsu->getUsuarioEmail($usuario["email"], $conexPDO);


    $perfil = array();

    $perfil["nombrePerfil"] = Utils::limpiar_datos($_POST["nombre"]);
    $perfil["avatar"] = "../images/avatar/default.png";
    $perfil["descripcion"] = "Aún no has escrito una descripción para tu perfil";
    $perfil["usuario_idUsuario"] = $usuarioRegistrado["idUsuario"];

    // Añado el registro

    $gestorPerfil = new Perfil();

    $resultadoPerfil = $gestorPerfil->addPerfil($perfil, $conexPDO);


    //Si ha ido bien el mensaje sera distint
    if ($resultado != null && $resultadoPerfil != null) {
        // Si todo salio bien
        // Mando el correo con el codigo de confirmacion
        Utils::correo_registro($usuario);

        $mensaje = "El usuario se registro correctamente";
        // Despues de ingresar el usuario lo mando a la vista de activacion
        include("../views/activarUsuario.php");
    } else {
        if ($resultado == null) {

            $gestorPerfil->delPerfilNombre($perfil["nombrePerfil"], $conexPDO);
        }
        if ($resultadoPerfil == null) {

            $gestorUsu->delUsuarioEmail($usuario["email"], $conexPDO);
        }


        $mensaje = "Nombre de usuario o email ya en uso, inténtelo de nuevo";

        include("../views/registroUsuario.php");
    }
} else {
    // Si no recibe los datos carga la vista del registro 
    include("../views/registroUsuario.php");
}
