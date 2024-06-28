<?php
include('./modelo.php');
$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function handleGetData($params) {
    header('Content-Type: application/json');
    readPintores($params);
}

function handleGetOptions() {
    header('Content-Type: application/json');
    readEstilos();
}

function handlePostData($params) {
    header('Content-Type: application/json');
    createPintor($params);
}

function handlePatchData($params) {
    header('Content-Type: application/json');
    updatePintor($params);
}

function handleDeleteData($params) {
    header('Content-Type: application/json');
    deletePintor($params);
}

$routes = [
    'GET' => [
        '/LaboratorioIII/Php/DbABM/controlador.php/data' => 'handleGetData',
        '/LaboratorioIII/Php/DbABM/controlador.php/options' => 'handleGetOptions'
    ],
    'POST' => [
        '/LaboratorioIII/Php/DbABM/controlador.php/data' => 'handlePostData'
    ],
    'PATCH' => [
        '/LaboratorioIII/Php/DbABM/controlador.php/data' => 'handlePatchData'
    ],
    'DELETE' => [
        '/LaboratorioIII/Php/DbABM/controlador.php/data' => 'handleDeleteData'
    ]
];

if (isset($routes[$requestMethod][$path])) {
    switch ($requestMethod) {
        case 'GET':
            call_user_func($routes[$requestMethod][$path], $_GET);
            break;
        case 'POST':
           call_user_func($routes[$requestMethod][$path], $_POST);
           break;
        case 'PATCH':
            parse_str(file_get_contents('php://input'), $patchVars);
            call_user_func($routes[$requestMethod][$path], $patchVars);
            break;
        case 'DELETE':
            parse_str(file_get_contents('php://input'), $deleteVars);
            call_user_func($routes[$requestMethod][$path], $deleteVars);
            break;
        default:
            header("HTTP/1.1 405 Method Not Allowed");
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
} else {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(['error' => 'Ruta no encontrada']);
}
?>
