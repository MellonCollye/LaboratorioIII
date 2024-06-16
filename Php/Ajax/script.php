<?php

    sleep(5);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $processedData = [
            'word' => $data,
            'md5' => md5($data),
            'sha1' => sha1($data)
        ];
        $response = [
            'status' => 'success',
            'received' => $processedData
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>