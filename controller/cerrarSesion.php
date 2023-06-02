<?php
// Inicializar la sesión.
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// borro las cookies de la sesion
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruyo la sesion
session_destroy();

// redirijo al login
header("Location:../controller/loginUsuarioController.php");
?>