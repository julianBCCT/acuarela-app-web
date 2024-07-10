<?php 
    session_start();
    // Verificar si hay una sesión de usuario iniciada
    if (isset($_SESSION["userLogged"])) {
        // Si hay una sesión iniciada, no se realizan acciones adicionales
    } else {
        // Si la cookie no está presente, se redirige al usuario a la página de inicio de sesión
        $currentURL = $_SERVER['REQUEST_URI'];
        if ($currentURL != '/miembros/') {
            header("Location: /miembros/");
            exit(); // Salir del script después de la redirección
        }
    }
    include "sdk.php";
    $a = new Acuarela();
?>