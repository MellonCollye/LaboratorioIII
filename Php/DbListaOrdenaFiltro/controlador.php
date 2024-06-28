<?php

include("./modelo.php");

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];

if ($path == '/LaboratorioIII/Php/DbListaOrdenaFiltro/controlador.php/data' &&  $requestMethod == 'GET') {
    header('Content-Type: application/json');
    readPintores($_GET);
}   

if ($path == '/LaboratorioIII/Php/DbListaOrdenaFiltro/controlador.php/options' && $requestMethod == 'GET') {
    header('Content-Type: application/json');
    readEstilos();
} 

?>