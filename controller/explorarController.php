<?php 

// Inicio sesion
session_start();

// Si el id de la sesion es null, es decir no hay ningun usuario logeado este lo manda al login de nuevo
if($_SESSION["id"]==null){
    header("Location:../controller/loginUsuarioController.php");
}

if($_SESSION["id"]!=null){
  
    include("../views/explorar.php");
}

