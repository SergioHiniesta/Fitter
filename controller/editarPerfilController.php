<?php

session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if ($_SESSION["id"] == null) {
    header("Location:../controller/loginUsuarioController.php");
}

$id=$_SESSION["id"];
$email=$_SESSION["email"];
$nombre=$_SESSION["nombre"];

use \model\Perfil;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Perfil.php");
require_once("../model/Utils.php");

$mensaje="";    

$gestorPerfil = new Perfil();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();

//Recolectamos los datos del perfil
$datosPerfil = $gestorPerfil->getPerfil($_SESSION["id"], $conexPDO);


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["descripcion"])) {

    $perfilNuevo = array();

    $perfilNuevo["nombrePerfil"] = $_SESSION["nombre"];
    $perfilNuevo["descripcion"] = Utils::limpiar_datos($_POST["descripcion"]);
    $perfilNuevo["idPerfil"] = $_SESSION["id"];

    // Si tiene imagen la guardo
    if ($_FILES["imagen"]["size"]!=0) {

        // Declaro la variable que contiene todos los datos de la imagen
        // su nombre 

        $imagen = $_FILES["imagen"];
        $nombreImg = $imagen["name"];

        // ruta de guardado
        $ruta = "../images/avatar/" . $nombreImg;

        // muevo el archivo a la carpeta images
        move_uploaded_file($imagen["tmp_name"], $ruta);


        // inserto la ruta al array
        $perfilNuevo["avatar"] = $ruta;
        
    } else {
        // Si no recibo una foto nuevo dejo la anterior
        $perfilNuevo["avatar"] = $datosPerfil["avatar"];
    }



}

if(!empty($perfilNuevo)){
    
    //Añadimos el post
    $resultado = $gestorPerfil->updatePerfil($perfilNuevo, $conexPDO);

    if ($resultado != null) {
        $mensaje = "El usuario se registro correctamente";
        $datosPerfil["avatar"] = $perfilNuevo["avatar"];
        $datosPerfil["descripcion"] = $perfilNuevo["descripcion"];
    } else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos";

    include("../views/editarPerfil.php");

}


include("../views/editarPerfil.php");
