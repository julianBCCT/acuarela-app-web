<?php 
session_start();
include "../includes/sdk.php";
$a = new Acuarela();
$_SESSION['activeDaycare'] = $_GET['daycare'];

if(isset($_GET['inscripcion'])){
    header("Location: /miembros/acuarela-app-web/agregar-ninx");
}else{
    header("Location: /miembros/acuarela-app-web/");
}
?>