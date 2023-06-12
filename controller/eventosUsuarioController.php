<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Perfil;
use \model\Evento;
 
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Perfil.php");
require_once("../model/Evento.php");
require_once("../model/Utils.php");

// Si recibo el nombre del usuario
if(isset($_GET["usuario"])){    

    $nombreUsuario = $_GET["usuario"];

    $gestorPerfil = new Perfil();
    $gestorEvento = new Evento();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del perfil
    $perfil = $gestorPerfil->getPerfilNombre($nombreUsuario, $conexPDO);

    // Si el perfil es de la persona logeada guardo el resultado
    

    $eventos = $gestorEvento->getEventosUsuario($perfil["usuario_idUsuario"], $conexPDO);

    include("../views/eventosUsuario.php");

}else{
    header("Location:../controller/mainController.php");
}