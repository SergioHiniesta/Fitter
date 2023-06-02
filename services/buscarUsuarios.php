<?php

namespace services;

use \model\Perfil;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Perfil.php");
require_once("../model/Utils.php");

if(isset($_POST["nombre"])){
    
    $usuarios = array();
    
    $gestorPerfil = new Perfil();
    
    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $nombre = $_POST["nombre"];
    
    $usuarios = $gestorPerfil->getPerfilesBusqueda($nombre,$conexPDO);

    if(!empty($usuarios)){
        for ($i = 0; $i < count($usuarios); $i++){
    
            print('
            <li class="card w-100 mb-2" style="max-width: 700px">
                          <div class="row my-2 mx-1">
                            <div class="col-3">
                              <img
                                src="'.$usuarios[$i]['avatar'].'"
                                class="rounded-circle border"
                                style="width: 100%; height: auto; max-width: 70px"
                                alt=""
                              />
                            </div>
                            <div class="col-9 d-flex align-items-center">
                              <a
                                href="../controller/perfilController.php?usuario='.$usuarios[$i]['nombrePerfil'].'"
                                class="link-secondary"
                                style="text-decoration: none"
                              >
                                <h2>'.$usuarios[$i]['nombrePerfil'].'</h2>
                              </a>
                            </div>
                          </div>
                        </li>');
        }
        
    }else{
        print('
        <div class="row my-2 mx-1 text-center">

          <h2 class="text-secondary">Otras personas están esperando que los sigas</h2>

          <img src="../images/busqueda.png" class="img-fluid" alt="">

        </div>');
    }
}

?>
