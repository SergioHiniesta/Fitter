<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Perfil;
use \model\Seguir;
 
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Perfil.php");
require_once("../model/Seguir.php");
require_once("../model/Utils.php");

// Si recibo el nombre del usuario
if(isset($_GET["usuario"])){   

    $nombreUsuario = $_GET["usuario"];

    $gestorPerfil = new Perfil();
    $gestorSeguir = new Seguir();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del perfil
    $perfil = $gestorPerfil->getPerfilNombre($nombreUsuario, $conexPDO);

    // Variable con las id del seguimiento

    $seguimiento = array();

    // Donde el seguidor sera el usuario logeado que sigue al usuario del perfil
    $seguimiento["idSeguidor"] = $_SESSION["id"];
    $seguimiento["usuario_idUsuario"] = $perfil["usuario_idUsuario"];

    $gestorSeguir->addSeguir($seguimiento, $conexPDO);

    // Vuelvo al perfil del usuario
    header('Location:../controller/perfilController.php?usuario='.$perfil["nombrePerfil"].'');

} else{
    // Vuelvo al main controller
    header('Location:../controller/mainController.php');
}