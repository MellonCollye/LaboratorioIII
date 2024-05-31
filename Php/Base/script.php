<h1>Escrito afuera del script PHP</h1>
<hr>

<?php
    include('../Utilities.inc');


    createHeader(1,"Texto devuelto usando ".createSpan("echo","red"));
    createHr();

    $nombre = "Matias Balbo";
    createHeader(1,"Devuelto sin concatenador");
    echo "<h3><span style='color: red;'>\$nombre</span> : $nombre</h3>";
    createHeader(1,"Devuelto con concatenador");
    createHeader(3,createSpan("\$nombre","red") . " : " . $nombre);
    createHr();

    $trueBoolean = true;
    $falseBoolean = false; 
    createHeader(2,"variable tipo bool verdadera " . createSpan("\$trueBoolean","red") .  " : " . $trueBoolean);
    createHeader(2,"variable tipo bool falsa " . createSpan("\$falseBoolean","red") .  " : " . $falseBoolean);

    createHr();

    define("CONSTANTE", "Juan");

    createHeader(2,createSpan("CONSTANTE","red") . " : " . CONSTANTE);
    createHeader(2,"Tipo de " . createSpan("CONSTANTE","red") . " : " . gettype(CONSTANTE));
   
    createHr();

    CreateHeader(2,"Arrays");

    $nombres = [];

    $nombres = ["Pedro", "Tomas"];

    createHeader(3,createSpan("\$nombres[0]","red")." : ".$nombres[0]);
    createHeader(3,createSpan("\$nombres[1]","red")." : ".$nombres[1]);
    createHeader(3,"Tipo de ".createSpan("\$nombres","red"). " : ".gettype($nombres));
    
    array_push($nombres,"Juan","Marcos");
    createHeader(3,"Todos los elementos");

    createList($nombres);

    createHeader(3,"Arreglo de dos dimensiones");
    $names = ["Peter","Tom","Jhon","Michael"];
    $ruso = ["Петр","Фома","Михаил","Иоанн"];

    $diccionario = [$nombres,$names, $ruso];
    $headers = ["Español","Ingles","Ruso"];

    createTableWithNumeric($diccionario,$headers);

    createHeader(3,"Tambien se puede expresar asi \$diccionario[1][2]".$diccionario[1][2]);
    
    createHeader(3,"Arrays asociativos");

    $persona = [
        "nombre" => "Juan",
        "edad" => 30,
        "ciudad" => "Rosario"
    ];

    createHeader(4,"Nombre: " . $persona["nombre"]);
    createHeader(4,"Edad: " . $persona["edad"] );
    createHeader(4,"Ciudad: " . $persona["ciudad"]);
    
    createHeader(3,"La cantidad de elementos del array es: ". sizeof($persona));
    createHeader(3,"Tipo de dato: ".gettype($persona));

    createHr();

    createHeader(2,"Expresiones aritmeticas");

    $x = 4;
    $y = 8;
    createHeader(3,"La variable ".createSpan("\$x ","red")."tiene el valor : " . $x);
    createHeader(3,"La variable ".createSpan("\$x ","red")."tiene el tipo : " . gettype($x));
    createHeader(3,"La variable ".createSpan("\$y ","red")."tiene el valor : " . $y);
    createHeader(3,"La variable ".createSpan("\$y ","red")."tiene el tipo : " . gettype($y));

    createHeader(3,"x + y : ".createSpan(($x + $y),"red"));
    createHeader(3,"x * y : ".createSpan( $x * $y ,"red"));
    createHeader(3,"x / y : ".createSpan($x / $y,"red"));


?>