<?php
    include("../Utilities.inc");
    echo "<h1>Variables de servidor</h1>";

    $server = [
        "SERVER_ADDR" => $_SERVER["SERVER_ADDR"],
        "SERVER_PORT" => $_SERVER["SERVER_PORT"],
        "SERVER_NAME" => $_SERVER["SERVER_NAME"],
        "DOCUMENT_ROOT" => $_SERVER["DOCUMENT_ROOT"]
    ];

    createTableWithAssociative($server);


    echo "<h1>Variables de cliente</h1>";

    $cliente = [
        "REMOTE_ADDR" => $_SERVER["REMOTE_ADDR"],
        "REMOTE_PORT" => $_SERVER["REMOTE_PORT"] 
    ];

    createTableWithAssociative($cliente);

    echo "<h1>Variables de requerimento</h1>";

    $req = [
        "SCRIPT_NAME" => $_SERVER["SCRIPT_NAME"],
        "REQUEST_METHOD" => $_SERVER["REQUEST_METHOD"] 
    ];
     
    createTableWithAssociative($req);

    echo "<h1>Todas</h1>";

    createTableWithAssociative($_SERVER);


?>