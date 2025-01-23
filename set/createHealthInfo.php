<?php
include "../includes/sdk.php";
$a = new Acuarela();

$data = [
    "asma" => isset($_POST['asma']) ? true : false, // Checkbox
    "alergias" => isset($_POST['alergias']) ? $_POST['alergias'] : "",
    "child" => $_POST['kid_id'] // ID del niño para asociar el registro
];

$jsonData = json_encode($data);
$response = $a->postHealthInfo($jsonData);

header('Content-Type: application/json');
echo json_encode($response);
