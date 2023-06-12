<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if ($_SESSION["id"] == null) {
    header("Location:../controller/loginUsuarioController.php");
}

use \model\Post;
use \model\Comentario;

use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Post.php");
require_once("../model/Comentario.php");
require_once("../model/Utils.php");

// Si recibo el nombre del usuario
if (isset($_GET["post"])) {

    $post = $_GET["post"];
    $datosPost = array();


    $gestorPost = new Post();
    $gestorComentario = new Comentario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del post
    $datosPost = $gestorPost->getInfoPost($post, $conexPDO);

    if (isset($_POST["texto"])) {
        $comentario = array();
        $comentario["texto"] = $_POST["texto"];
        $comentario["post_idPost"] = $post;
        $comentario["usuario_idUsuario"] = $_SESSION["id"];

        $gestorComentario->addComentario($comentario, $conexPDO);

        $url = "Location:../controller/postController.php?post=".$post;
        header($url);

    }

    $comentarios = array();
    $comentarios= $gestorPost->getComentariosPost($post, $conexPDO);


    include("../views/post.php");
} else {
    header("Location:../controller/mainController.php");
}
