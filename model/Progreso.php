<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Progreso{

    /**
     * Nos devuelve los progresos registrados en la bd
     */
    public function getProgreso($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.progreso");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta un progreso a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addProgreso($progreso, $conexPDO)
    {

        $result = null;
        if (isset($progreso) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.progreso ( estaturaM, pesoKg, porcentajeGraso, IMC, fechaProg, usuario_idUsuario) 
                VALUES ( :estaturaM, :pesoKg, :porcentajeGraso, :IMC, :fechaProg, :usuario_idUsuario)");

                $sentencia->bindParam(":estaturaM", $progreso["estaturaM"]);
                $sentencia->bindParam(":pesoKg", $progreso["pesoKg"]);
                $sentencia->bindParam(":porcentajeGraso", $progreso["porcentajeGraso"]);
                $sentencia->bindParam(":IMC", $progreso["IMC"]);
                $sentencia->bindParam(":fechaProg", $progreso["fechaProg"]);
                $sentencia->bindParam(":usuario_idUsuario", $progreso["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un progreso a partir del id recibido como parametro
     */

    public function delProgreso($idProgreso, $conexPDO)
    {
        $result = null;

        if (isset($idProgreso) && is_numeric($idProgreso)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.progreso where idProgreso=?");
                    $sentencia->bindParam(1, $idProgreso);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un progreso recibiendo como parametros un array con los datos 
     * del progreso modificado y la conexion PDO
     */
    public function updateProgreso($progreso, $conexPDO)
    {

        $result = null;
        if (isset($progreso) && isset($progreso["idProgreso"]) && is_numeric($progreso["idProgreso"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.post set  estaturaM=:estaturaM, pesoKg=:pesoKg, porcentajeGraso=:porcentajeGraso,
                 fechaProg=:fechaProg where idProgreso=:idProgreso");

                $sentencia->bindParam(":estaturaM", $progreso["estaturaM"]);
                $sentencia->bindParam(":pesoKg", $progreso["pesoKg"]);
                $sentencia->bindParam(":porcentajeGraso", $progreso["porcentajeGraso"]);
                $sentencia->bindParam(":fechaProg", $progreso["fechaProg"]);
                $sentencia->bindParam(":idProgreso", $progreso["idProgreso"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}

?>