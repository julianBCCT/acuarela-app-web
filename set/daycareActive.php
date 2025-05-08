<?php 
session_start();
include "../includes/sdk.php";
$a = new Acuarela(); // Luego creas el objeto, que ya leerá el valor correcto
$_SESSION['activeDaycare'] = $_GET['daycare']; // También actualizas la sesión
$a->setDaycare($_GET['daycare']); // Esto actualiza internamente los valores

if (isset($_GET['inscripcion'])) {
    header("Location: /miembros/acuarela-app-web/agregar-ninx");
} else {
    header("Location: /miembros/acuarela-app-web/");
}
exit;
?>
