<?php
function createTableWithAssociative($array) {
    echo "<table style='border-collapse: collapse;>";
    echo "<tbody>";

    foreach(array_keys($array) as $key){
        echo "<tr''>";
        echo "<td style='background-color:red; border:2px solid black;'>".$key."</td>";
        echo "<td style='border:2px solid black;'>".$array[$key]."</td>";     
        echo "</tr>";
    }

    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

}

function createTableWithNumeric($array){
    //no implementado
}

function createSpan($str,$attr){
    $span = "<span style='";
    switch($attr){
        case "red":
            $span .= "color:red;";
            break;
        case "blue":
            $span .= "color:blue;";
            break;
    }
    $span .= "'>$str</span>";

    return $span;
}

function createHeader($type,$str){
    $buffer = "";
    switch($type){
        case 1:
            $buffer = "<h1>" . $str . "</h1>";
            break;
        case 2:
            $buffer = "<h2>" . $str . "</h2>";
            break;
        case 3:
            $buffer = "<h3>" . $str . "</h3>";
            break;
        case 4:
            $buffer =  "<h4>" . $str . "</h4>";
            break;
        case 5:
            $buffer =  "<h5>" . $str . "</h5>";
            break;
        case 6:
            $buffer =  "<h6>" . $str . "</h6>";
            break;
    }
    echo $buffer;
}

function createHr(){
    echo "<hr>";
}

?>