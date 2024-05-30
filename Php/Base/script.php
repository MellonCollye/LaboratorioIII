<h1>Escrito afuera del script PHP</h1>
<hr>

<?php
    
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "  <meta charset='UTF-8'>";
    echo "  <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "  <title>Document</title>";
    echo " <style> td{border:2px solid black;height:50px;width:50px;}</style>";
    echo "</head>";
    echo "<body>";

    echo "<h1> Texto devuelto usando <span style='color: red;'>echo</span></h1>";

    echo "<hr>";

    $nombre = "Matias Balbo";
    echo "<h2>Devuelto sin concatenador </h2>";
    echo "<h3><span style='color: red;'>\$nombre</span> : $nombre</h3>";
    echo "<h2>Devuelto con concatenador </h2>";
    echo "<h3><span style='color: red;'>\$nombre</span> :" . "$nombre </h3>";

    echo "<hr>";

    $trueBoolean = true;
    $falseBoolean = false; 
    echo "<h2>"."variable tipo bool verdadera ". "<span style='color: red;'>\$trueBoolean</span>" . " : " . $trueBoolean . "</h2>";
    echo "<h2>"."variable tipo bool falsa " . "<span style='color: red;'>\$falseBoolean</span>" . " : " . $falseBoolean ."</h2>";
    
    echo "<hr>";

    define("CONSTANTE", "Juan");
    echo "<h2>" . "<span style='color: red;'>CONSTANTE</span>"." : ". CONSTANTE . "</h2>";
    echo "<h2>"."tipo de <span style='color: red;'>CONSTANTE</span>". " : ". gettype(CONSTANTE) ."</h2>";
    
    echo "<hr>";

    echo "<h2>"."Arrays"."</h2>";

    $nombres = [];

    $nombres = ["Pedro", "Tomas"];
    echo "<h3>"."<span style='color: red;'>\$nombres[0]</span>"." : ".$nombres[0]."</h3>";
    echo "<h3>"."<span style='color: red;'>\$nombres[1]</span>"." : ".$nombres[1]."</h3>";
    echo "<h3>". "Tipo de <span style='color: red;'>\$nombres[1]</span> :".gettype($nombres) ."</h3>";
    
    array_push($nombres,"Juan","Marcos");
    echo "<h3>"."Todos los elementos"."</h3>";

    echo "<h3>"."<span style='color: red;'></span> "."</h3>";

    echo "<ul>";
    foreach($nombres as $nomb){
        echo "<li>".$nomb."</li>";
    }
    echo "</ul>";

    echo "<h3>"."Arreglo de dos dimensiones"."</h3>";

    $names = ["Peter","Tom","Jhon","Michael"];
    $ruso = ["Петр","Фома","Михаил","Иоанн"];

    $diccionario = [$nombres,$names, $ruso];
    $headers = ["Español","Ingles","Ruso"];
    $i=0;

    echo "<table style='border-collapse: collapse;>";
    echo "<tbody>";
    foreach($diccionario as $campo){
        echo "<tr''>";
        echo "<td style='background-color:red;'>".$headers[$i]."</td>";
        foreach($campo as $item){
            echo "<td>".$item."</td>";     
        }
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";

    echo "<h3>"."Tambien se puede expresar asi \$diccionario[1][2]: ".$diccionario[1][2]."</h3>";
    
    echo "<h3>"."Arrays asociativos: "."</h3>";

    $persona = [
        "nombre" => "Juan",
        "edad" => 30,
        "ciudad" => "Rosario"
    ];
    
    echo "<h4>"."Nombre: " . $persona["nombre"] ."</h4>";
    echo "<h4>"."Edad: " . $persona["edad"] ."</h4>";
    echo "<h4>"."Ciudad: " . $persona["ciudad"]."</h4>";

    echo "<h3>"."La cantidad de elementos del array es: ". sizeof($persona)."</h3>";
    echo "<h3>"."Tipo de dato: ".gettype($persona)."</h3>";

    echo "<hr>";
    echo "<h2>"."Expresiones aritmeticas"."</h2>";

    $x = 4;
    $y = 8;
    echo "<h3>"."La variable \$x tiene el valor: ".$x."</h3>";
    echo "<h3>"."La variable \$x tiene el tipo: ".gettype($x)."</h3>";
    echo "<h3>"."La variable \$y tiene el valor: ".$y."</h3>";
    echo "<h3>"."La variable \$y tiene el tipo: ".gettype($y)."</h3>";

    echo "<h3>"."x + y : ".($x + $y)."</h3>";
    echo "<h3>"."x * y : ". $x * $y ."</h3>";
    echo "<h3>"."x / y : ". $x / $y . "</h3>";


    echo "</body>";
    echo "</html>";
?>