<?php

namespace controller;

use \model\Usuario;
use \model\Perfil;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Perfil.php");
require_once("../model/Utils.php");

// Inicio sesion
session_start();

$mensaje="";

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $usuario = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    $email = Utils::limpiar_datos($_POST["email"]);

    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Saco los datos del usuario que va a confirmar 
    $usuario = $gestorUsu->getUsuarioEmail($email,$conexPDO);
    // Compruebo que la password sea la misma que la guardada en la bd
    // cogiendo el salt y encriptando la password introducida por el usuario y viendo si es igual que la guardada
    
    $passEncript= crypt($_POST["password"],'$5$rounds=5000$'.$usuario["salt"].'$');
    $passEncript = explode ("$", $passEncript);

    // Si el password 
    if($passEncript[4]==$usuario["password"]&& ($usuario["activo"]==1)){


        // Guardo el id del usuario en la sesion y el nombre
        $_SESSION["id"] = $usuario["idUsuario"];
        $_SESSION["email"] = $usuario["email"];

        // Cargo el nombre del usuario para guardarlo en la sesion

        $gestorPerfil = new Perfil();

        $perfil = $gestorPerfil->getPerfil($_SESSION["id"], $conexPDO);

        $_SESSION["nombre"] = $perfil["nombrePerfil"];

        // Genero cookies
        setcookie("id",$usuario["idUsuario"]);
        setcookie("nombre",$perfil["nombrePerfil"]);

        // si es asi redirecciono al mainController
        header("Location:../controller/mainController.php");
    }else{
        // Si no lo mando a login nuevamente 
        $mensaje = "Email o contraseña incorrectos, inténtalo de nuevo";
        include("../views/login.php");
    }

}else{
    // Si no llegan datos del formulario redirijo al login
    include("../views/login.php");

}   