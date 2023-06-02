<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Comentario{

    /**
     * Nos devuelve los Comentarios registrados en la bd
     */
    public function getComentarios($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.comentario");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta un comentario a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addComentario($comentario, $conexPDO)
    {

        $result = null;
        if (isset($comentario) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.comentario ( texto, post_idPost, usuario_idUsuario) 
                VALUES ( :texto, :post_idPost, :usuario_idUsuario)");

                $sentencia->bindParam(":texto", $comentario["texto"]);
                $sentencia->bindParam(":post_idPost", $comentario["post_idPost"]);
                $sentencia->bindParam(":usuario_idUsuario", $comentario["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un comentario a partir del id recibido como parametro
     */

    public function delComentario($idComentario, $conexPDO)
    {
        $result = null;

        if (isset($idComentario) && is_numeric($idComentario)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.comentario where idComentario=?");
                    $sentencia->bindParam(1, $idComentario);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un comentario recibiendo como parametros un array con los datos 
     * del comentario modificado y la conexion PDO
     */
    public function updateComentario($comentario, $conexPDO)
    {

        $result = null;
        if (isset($comentario) && isset($comentario["idComentario"]) && is_numeric($comentario["idComentario"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.comentario set  texto=:texto
                 where idComentario=:idComentario");

                $sentencia->bindParam(":texto", $comentario["texto"]);
                $sentencia->bindParam(":idComentario", $comentario["idComentario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
    ?>