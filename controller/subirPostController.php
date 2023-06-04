<?php

namespace controller;

use \model\Post;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Post.php");
require_once("../model/Utils.php");

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["texto"])) {

    session_start();

    $post = array();
    
    // Si tiene imagen la guardo
    if(isset($_FILES["imagen"])){
        
        // Declaro la variable que contiene todos los datos de la imagen
       // su nombre 

        $imagen = $_FILES["imagen"];
        $nombreImg= $imagen["name"];
    
        // ruta de guardado
        $ruta = "../images/postsImg/".$nombreImg;
   
        // muevo el archivo a la carpeta images
        move_uploaded_file($imagen["tmp_name"], $ruta);
        

        // inserto la ruta al array
        $post["filePost"] = $ruta;

    }
    $post["textoPost"] = Utils::limpiar_datos($_POST["texto"]);


    $post["usuario_idUsuario"] = $_SESSION["id"];
    
    
    $gestorPost = new Post();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Añadimos el post
    $resultado = $gestorPost->addPost($post, $conexPDO);

    if ($resultado != null)
    $mensaje = "El post se publicó correctamente"; 

    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos";

    
    header("Location:../controller/mainController.php");

    $imagen = $_FILES["imagen"];
}else{
    header("Location:../controller/mainController.php");
}