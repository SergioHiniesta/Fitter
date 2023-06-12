<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Participante;
 
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Participante.php");

require_once("../model/Utils.php");

// Si recibo el nombre del usuario
if(isset($_GET["evento"])){   

    $id = $_SESSION["id"];
    $evento=$_GET["evento"];

    $gestorParticipante = new Participante();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del perfil
    $gestorParticipante->delParticipante($id,$evento, $conexPDO);

    // Vuelvo al perfil del usuario
    $url = "Location:../controller/eventoController.php?evento=".$evento;
    header($url);


} else{
    // Vuelvo al main controller
    header('Location:../controller/mainController.php');
}