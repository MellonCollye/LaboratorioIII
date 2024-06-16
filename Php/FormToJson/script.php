<?php

    sleep(3);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $response = [
            'status' => 'success',
            'received' => $data
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>