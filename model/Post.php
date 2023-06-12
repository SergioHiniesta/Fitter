<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Post{

    /**
     * Nos devuelve los posts registrados en la bd
     */
    public function getPost($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.post");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    public function getComentariosPost($idPost,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.comentario
                INNER JOIN fitter.post ON post.idPost = comentario.post_idPost
                INNER JOIN fitter.perfil ON comentario.usuario_idUsuario = perfil.usuario_idUsuario
                WHERE comentario.post_idPost = ?");

                // BindParam del email
                $sentencia->bindParam(1, $idPost);

                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos de los personajes
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    public function getInfoPost($idPost,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.post
                INNER JOIN fitter.perfil ON post.usuario_idUsuario = perfil.usuario_idUsuario
                WHERE post.idPost = ?");

                // BindParam del email
                $sentencia->bindParam(1, $idPost);

                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos de los personajes
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }
    
    public function getPostInicio($idUsuario,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.post
                INNER JOIN fitter.perfil ON post.usuario_idUsuario = perfil.usuario_idUsuario
                INNER JOIN fitter.seguir ON post.usuario_idUsuario = seguir.usuario_idUsuario 
                WHERE seguir.idSeguidor = ? order by idPost desc");

                // BindParam del email
                $sentencia->bindParam(1, $idUsuario);

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
     * Inserta un post a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addPost($post, $conexPDO)
    {

        $result = null;
        if (isset($post) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.post ( textoPost, filePost, usuario_idUsuario) 
                VALUES ( :textoPost, :filePost, :usuario_idUsuario)");

                $sentencia->bindParam(":textoPost", $post["textoPost"]);
                $sentencia->bindParam(":filePost", $post["filePost"]);
                $sentencia->bindParam(":usuario_idUsuario", $post["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un post a partir del id recibido como parametro
     */

    public function delPost($idPost, $conexPDO)
    {
        $result = null;

        if (isset($idPost) && is_numeric($idPost)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.post where idPost=?");
                    $sentencia->bindParam(1, $idPost);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un post recibiendo como parametros un array con los datos 
     * del post modificado y la conexion PDO
     */
    public function updatePost($post, $conexPDO)
    {

        $result = null;
        if (isset($post) && isset($post["idPost"]) && is_numeric($post["idPost"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.post set  textoPost=:textoPost, filePost=:filePost
                 where idPost=:idPost");

                $sentencia->bindParam(":textoPost", $post["textoPost"]);
                $sentencia->bindParam(":filePost", $post["filePost"]);
                $sentencia->bindParam(":idPost", $post["idPost"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
    ?>