<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Participante{

    /**
     * Nos devuelve los participantes registrados en la bd
     */
    public function getParticipantes($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.participante");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta un participante a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addParticipante($participante, $conexPDO)
    {

        $result = null;
        if (isset($participante) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.participante ( evento_idEvento, usuario_idUsuario, pagado) 
                VALUES ( :evento_idEvento, :usuario_idUsuario, :pagado)");

                $sentencia->bindParam(":evento_idEvento", $participante["evento_idEvento"]);
                $sentencia->bindParam(":usuario_idUsuario", $participante["usuario_idUsuario"]);
                $sentencia->bindParam(":pagado", $participante["pagado"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un participante a partir del id recibido como parametro
     */

    public function delParticipante($idParticipante, $conexPDO)
    {
        $result = null;

        if (isset($idParticipante) && is_numeric($idParticipante)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.participante where idParticipante=?");
                    $sentencia->bindParam(1, $idParticipante);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un participante recibiendo como parametros un array con los datos 
     * del participante modificado y la conexion PDO
     */
    public function updateParticipante($participante, $conexPDO)
    {

        $result = null;
        if (isset($participante) && isset($participante["idParticipante"]) && is_numeric($participante["idParticipante"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.participante set  pagado=:pagado where idParticipante=:idParticipante");

                $sentencia->bindParam(":pagado", $participante["pagado"]);
                $sentencia->bindParam(":idParticipante", $participante["idParticipante"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
    ?>