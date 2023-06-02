<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Evento{

    /**
     * Nos devuelve los eventos registrados en la bd
     */
    public function getEventos($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.evento");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta un evento a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addEvento($evento, $conexPDO)
    {

        $result = null;
        if (isset($evento) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.evento ( titulo, descripcionEvento, fileEvento, precio, usuario_idUsuario) 
                VALUES ( :titulo, :descripcionEvento, :fileEvento, :precio, :usuario_idUsuario)");

                $sentencia->bindParam(":titulo", $evento["titulo"]);
                $sentencia->bindParam(":descripcionEvento", $evento["descripcionEvento"]);
                $sentencia->bindParam(":fileEvento", $evento["fileEvento"]);
                $sentencia->bindParam(":precio", $evento["precio"]);
                $sentencia->bindParam(":usuario_idUsuario", $evento["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un evento a partir del id recibido como parametro
     */

    public function delEvento($idEvento, $conexPDO)
    {
        $result = null;

        if (isset($idEvento) && is_numeric($idEvento)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.evento where idEvento=?");
                    $sentencia->bindParam(1, $idEvento);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un evento recibiendo como parametros un array con los datos 
     * del evento modificado y la conexion PDO
     */
    public function updateEvento($evento, $conexPDO)
    {

        $result = null;
        if (isset($evento) && isset($evento["idEvento"]) && is_numeric($evento["idEvento"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.evento set  titulo=:titulo, descripcionEvento=:descripcionEvento,
                 fileEvento=:fileEvento, precio=:precio where idEvento=:idEvento");

                $sentencia->bindParam(":titulo", $evento["titulo"]);
                $sentencia->bindParam(":descripcionEvento", $evento["descripcionEvento"]);
                $sentencia->bindParam(":fileEvento", $evento["fileEvento"]);
                $sentencia->bindParam(":precio", $evento["precio"]);
                $sentencia->bindParam(":idEvento", $evento["idEvento"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
    ?>