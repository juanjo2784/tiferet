<?php 
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST');

$json = json_decode(file_get_contents("php://input"), true);
var_dump($json['formValues']);

    require_once('ApiEventos.php');
    $evento = new Evento(); 
    $evento->addEvento($json['formValues']);
?>
