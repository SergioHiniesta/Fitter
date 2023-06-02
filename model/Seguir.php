<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;


class Seguir
{

    /**
     * Nos devuelve los seguimientos registrados en la bd
     */
    public function getSeguir($conexPDO)
    {

        if ($conexPDO != null) {
            try {

                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.seguir");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }
    public function getSeguirPerfil($idLogeado, $idUsuarioPerfil, $conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.seguir where idSeguidor = ? AND usuario_idUsuario = ?");

                // BindParam del email
                $sentencia->bindParam(1, $idLogeado);
                $sentencia->bindParam(2, $idUsuarioPerfil);

                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos de los personajes
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta una accion de seguir a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addSeguir($seguir, $conexPDO)
    {

        $result = null;
        if (isset($seguir) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.seguir ( idSeguidor, usuario_idUsuario) 
                VALUES ( :idSeguidor, :usuario_idUsuario)");

                $sentencia->bindParam(":idSeguidor", $seguir["idSeguidor"]);
                $sentencia->bindParam(":usuario_idUsuario", $seguir["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
    /**
     * Funcion que borra un seguimiento a partir del id recibido como parametro
     */

    public function delSeguir($seguir, $conexPDO)
    {
        $result = null;


            if ($conexPDO != null) {
                try {

                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.seguir where idSeguidor = :idSeguidor and usuario_idUsuario = :usuario_idUsuario");

                    $sentencia->bindParam(":idSeguidor", $seguir["idSeguidor"]);
                    $sentencia->bindParam(":usuario_idUsuario", $seguir["usuario_idUsuario"]);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }

        }

        return $result;
    }
}
