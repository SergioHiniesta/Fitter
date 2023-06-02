<?php

namespace model;
require_once("Utils.php");
use \PDO;
use \PDOException;


class Usuario{

    /**
     * Nos devuelve los Usuarios registrados en la bd
     */
    public function getUsuarios($conexPDO)
    {

        if ($conexPDO != null) {
            try {
            
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.usuario");
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

     /**
     * Nos devuelve los Usuarios registrados en la bd
     */
    public function getUsuarioEmail($email,$conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia a ejecutar con prepare statement
                $sentencia = $conexPDO->prepare("SELECT * FROM fitter.usuario where email = ?");

                // BindParam del email
                $sentencia->bindParam(1, $email);

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
     * Inserta un usuario a la base de datos recibiendo un array con todos los datos requeridos
     */
    public function addUsuario($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO fitter.usuario (password, email, activo, 
                codActivacion, salt) VALUES ( :password, :email, :activo, :codActivacion, :salt)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
     /**
     * Funcion que borra un usuario a partir del id recibido como parametro
     */

    public function delUsuario($idUsuario, $conexPDO)
    {
        $result = null;

        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.usuario where idUsuario=?");
                    $sentencia->bindParam(1, $idUsuario);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }
    public function delUsuarioEmail($email, $conexPDO)
    {
        $result = null;



            if ($conexPDO != null) {
                try {
                    
                    $sentencia = $conexPDO->prepare("DELETE  FROM fitter.usuario where email=?");
                    $sentencia->bindParam(1, $email);

                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }


        return $result;
    }

     /**
     * Funcion que actualiza los datos de un usuario recibiendo como parametros un array con los datos 
     * del usuario modificado y la conexion PDO
     */
    public function updateUsuario($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && isset($usuario["idUsuario"]) && is_numeric($usuario["idUsuario"])  && $conexPDO != null) {

            try {
               
                $sentencia = $conexPDO->prepare("UPDATE fitter.usuario set  password=:password, 
                email=:email, activo=:activo, codActivacion=:codActivacion, salt=:salt
                 where idUsuario=:idUsuario");

                $sentencia->bindParam(":idUsuario", $usuario["idUsuario"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);

                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
