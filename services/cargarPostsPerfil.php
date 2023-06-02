<?php

namespace services;
use \model\Utils;


//Añadimos el código del modelo
require_once("../model/Utils.php");

    if(isset($_POST["getData"])){
        // conex
        $conexPDO = Utils::conectar();

        $start = $_POST["start"];
        $limit = $_POST["limit"];
        $idUsuario = $_POST["id"];

        $sql = $conexPDO->query("SELECT * FROM fitter.post
        INNER JOIN fitter.perfil ON post.usuario_idUsuario = perfil.usuario_idUsuario
        WHERE post.usuario_idUsuario = $idUsuario LIMIT $start, $limit");
        $resultado = $sql->fetchAll();
        
        $response = $resultado;


    }
