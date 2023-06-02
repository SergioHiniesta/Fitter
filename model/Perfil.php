<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Perfil{

    public function getPerfil($id,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.perfil where usuario_idUsuario = ?");

                // BindParam del email
                $sentencia->bindParam(1, $id);

                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos de los personajes
                return $sentencia->fetch();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }
    public function getPerfilNombre($nombre,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.perfil where nombrePerfil = ?");

                // BindParam del email
                $sentencia->bindParam(1, $nombre);

                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos de los personajes
                return $sentencia->fetch();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Nos devuelve los perfiles registrados en la bd
     */
    public function getPerfiles($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.perfil");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    public function getPerfilesBusqueda($nombre, $conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.perfil WHERE nombrePerfil LIKE CONCAT('%', ?, '%') limit 0,5");
                $sentencia->bindParam(1, $nombre);
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Inserta un perfil a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addPerfil($perfil, $conexPDO)
    {

        $result = null;
        if (isset($perfil) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("INSERT INTO fitter.perfil ( nombrePerfil, avatar, descripcion, usuario_idUsuario) 
                VALUES ( :nombrePerfil, :avatar, :descripcion, :usuario_idUsuario)");

                $sentencia->bindParam(":nombrePerfil", $perfil["nombrePerfil"]);
                $sentencia->bindParam(":avatar", $perfil["avatar"]);
                $sentencia->bindParam(":descripcion", $perfil["descripcion"]);
                $sentencia->bindParam(":usuario_idUsuario", $perfil["usuario_idUsuario"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un perfil a partir del id recibido como parametro
     */

    public function delPerfil($idPerfil, $conexPDO)
    {
        $result = null;

        if (isset($idPerfil) && is_numeric($idPerfil)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.perfil where idPerfil=?");
                    $sentencia->bindParam(1, $idPerfil);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    public function delPerfilNombre($nombre, $conexPDO)
    {
        $result = null;

        
            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.perfil where nombrePerfil=?");
                    $sentencia->bindParam(1, $nombre);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        

        return $result;
    }

     /**
     * Funcion que actualiza los datos de un perfil recibiendo como parametros un array con los datos 
     * del perfil modificado y la conexion PDO
     */
    public function updatePerfil($perfil, $conexPDO)
    {

        $result = null;
        if (isset($perfil) && isset($perfil["idPerfil"]) && is_numeric($perfil["idPerfil"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.perfil set  nombrePerfil=:nombrePerfil, avatar=:avatar, descripcion=:descripcion
                where idPerfil=:idPerfil");

                $sentencia->bindParam(":nombrePerfil", $perfil["nombrePerfil"]);
                $sentencia->bindParam(":avatar", $perfil["avatar"]);
                $sentencia->bindParam(":descripcion", $perfil["descripcion"]);
                $sentencia->bindParam(":idPerfil", $perfil["idPerfil"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }


    
    public function getPostPerfil($idUsuario,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.post
                INNER JOIN fitter.perfil ON post.usuario_idUsuario = perfil.usuario_idUsuario
                WHERE post.usuario_idUsuario = ? order by idPost desc");

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
}
    ?>