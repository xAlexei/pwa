<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}

$user = $_SESSION["username"];


require_once "config.php";
$conn = $link;


// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirecciona a la página de inicio de sesión o a otra página que desees
header("Location: index.php");
exit;
?>
