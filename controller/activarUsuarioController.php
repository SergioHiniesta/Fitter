<?php

namespace controller;

use \model\Usuario;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["codActivacion"]) && isset($_POST["email"])) {
    $usuario = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    $codActivacion = Utils::limpiar_datos($_POST["codActivacion"]);


    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Saco los datos del usuario que va a confirmar 
    $usuario = $gestorUsu->getUsuarioEmail($_POST["email"],$conexPDO);

    // Comparo el codigo de activacion recibido con el de la base de datos si es igual este se logeara y pasara a la vista principal

    if($codActivacion==$usuario["codActivacion"]){
        // lo activo
        $usuario["activo"]=1;
        // guardo el registro
        $resultado = $gestorUsu->updateUsuario($usuario, $conexPDO);

        //Si ha ido bien el mensaje sera distint
        if ($resultado != null)
            $mensaje = "El Usuario se activó correctamente";
        else
            $mensaje = "Ha habido un fallo al acceder a la Base de Datos";
    
        // Despues de activar la cuenta lo mando al login
        header("Location:../controller/loginUsuarioController.php");
    }else{
        // Si no cumple vuelve a cargarse la activacion
        include("../views/activarUsuario.php");
        $mensaje = "Codigo de activación no valido";
    }

} else{
    // Si no recibe los datos carga la vista del registro 
    header("Location:../controller/loginUsuarioController.php");
}