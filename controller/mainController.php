<?php 

// Inicio sesion
session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Post;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Post.php");
require_once("../model/Utils.php");

if($_SESSION["id"]!=null){
    $gestorPost = new Post();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $posts = $gestorPost->getPostInicio($_SESSION["id"], $conexPDO);

    include("../views/inicio.php");
}


?>