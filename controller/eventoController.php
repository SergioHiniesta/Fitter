<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if ($_SESSION["id"] == null) {
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Evento;
use \model\Participante;

use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Evento.php");
require_once("../model/Participante.php");
require_once("../model/Utils.php");

// Si recibo el nombre del usuario
if (isset($_GET["evento"])) {
    $participa=0;

    $evento = $_GET["evento"];
    $datosEvento = array();
    $participantes = array();
    $numParticipantes=0;


    $gestorEvento = new Evento();
    $gestorParticipante = new Participante();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del post
    $datosEvento = $gestorEvento->getInfoEvento($evento, $conexPDO);

    $participante = $gestorParticipante->getParticipante($_SESSION["id"],$evento, $conexPDO);

    if(!empty($participante)){
        $participa=1;
    }else{
        $participa=0;
    }

    $participantes = $gestorParticipante->getParticipantesEvento($evento, $conexPDO);

    $numParticipantes = count($participantes);


    include("../views/evento.php");
} else {
    header("Location:../controller/mainController.php");
}