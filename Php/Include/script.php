<?php


    echo "<h1>En este ejemplo se utiliza la funcion include()</h1>";
    echo "<h1>Antes de insertar el include las variables declaradas no existen</h1>";

    $matriz = [$empleados1,$empleados2];
    
    echo "<table style='border-collapse: collapse;>";
    echo "<tbody>";
    foreach($matriz as $campo){
        echo "<tr''>";
        echo "<td style='background-color:red;border:2px solid black;'>".$headers[$i]."</td>";
        foreach($campo as $item){
            echo "<td style='border:2px solid black;'>".$item."</td>";     
        }
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";


    include("./include.inc");
    echo "<h1>Aqui ya se ejecuto el include</h1>";

    echo "<h2>Los dos arrays son: </h2>";

    $matriz = [$empleados1,$empleados2];
    $headers = ["Empleados Mañana","Empleados Tarde"];
    $i=0;

    echo "<table style='border-collapse: collapse;>";
    echo "<tbody>";
    foreach($matriz as $campo){
        echo "<tr''>";
        echo "<td style='background-color:red;border:2px solid black;'>".$headers[$i]."</td>";
        foreach($campo as $item){
            echo "<td style='border:2px solid black;'>".$item."</td>";     
        }
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";

 
    echo "<h2>La longitud de los arreglos es: ".sizeof($empleados1)." y ".sizeof($empleados2)."</h2>";

?>

