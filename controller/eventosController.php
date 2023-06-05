<?php

namespace controller;

use \model\Evento;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Evento.php");
require_once("../model/Utils.php");

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

$gestorEvento = new Evento();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();

$eventos = $gestorEvento->getEventos($conexPDO);


if (isset($_POST["titulo"]) && isset($_POST["descripcionEvento"]) && isset($_POST["numParticipantes"])) {

    $evento = array();

    // Si tiene imagen la guardo
    if (isset($_FILES["imagen"])) {

        // Declaro la variable que contiene todos los datos de la imagen
        // su nombre 

        $imagen = $_FILES["imagen"];
        $nombreImg = $imagen["name"];

        // ruta de guardado
        $ruta = "../images/eventos/" . $nombreImg;

        // muevo el archivo a la carpeta images
        move_uploaded_file($imagen["tmp_name"], $ruta);


        // inserto la ruta al array
        $evento["fileEvento"] = $ruta;
    }

    $evento["titulo"] = Utils::limpiar_datos($_POST["titulo"]);

    $evento["descripcionEvento"] = Utils::limpiar_datos($_POST["descripcionEvento"]);

    $evento["numParticipantes"] = Utils::limpiar_datos($_POST["numParticipantes"]);

    $evento["precio"] = 0;

    $evento["usuario_idUsuario"] = $_SESSION["id"];


    //Añadimos el post
    $resultado = $gestorEvento->addEvento($evento, $conexPDO);

    if ($resultado != null)
        $mensaje = "El evento se creó correctamente";

    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos";

        header("Location:../controller/eventosController.php");
} else {
    include("../views/eventos.php");
}
