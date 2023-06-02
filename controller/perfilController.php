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

    // Variables comprobacion
    $esUsuario = 0;
    $esSeguidor = 0;

    $nombreUsuario = $_GET["usuario"];

    $gestorPerfil = new Perfil();
    $gestorSeguir = new Seguir();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Recibo los datos del perfil
    $perfil = $gestorPerfil->getPerfilNombre($nombreUsuario, $conexPDO);

    // Si el perfil es de la persona logeada guardo el resultado
    if($perfil["nombrePerfil"] == $_SESSION["nombre"]){
        $esUsuario = 1;
    }else{
        // En caso contrario copruebo si es seguidor o no
        
        $seguir = $gestorSeguir->getSeguirPerfil($_SESSION["id"], $perfil["usuario_idUsuario"], $conexPDO);
        if(empty($seguir)){
            $esSeguidor=0;
        }else{
            $esSeguidor=1;
        }

    }

    $posts = $gestorPerfil->getPostPerfil($perfil["usuario_idUsuario"], $conexPDO);

    include("../views/perfil.php");

}else{
    header("Location:../controller/mainController.php");
}
