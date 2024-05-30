<?php

    include("../Utilities.inc");
    
    createHeader(1,"Variables tipo objeto en PHP. Objeto renglon");

 
    $objRenglonJugador = new stdclass;

    $objRenglonJugador -> nombre = "Juan";
    $objRenglonJugador -> edad = 30;
    $objRenglonJugador -> deporte = "Futbol";
    $objRenglonJugador -> descripcion = "Lleva 5 goles en contra en dos partidos, parece que juega para el otro equipo de lo malo que es. Pobre";

    createHeader(2,createSpan("\$objRenglonJugador","red"));

    createHeader(4,"Nombre: ".$objRenglonJugador->nombre);
    createHeader(4,"Edad: ".$objRenglonJugador->edad);
    createHeader(4,"Deporte: ".$objRenglonJugador->deporte);
    createHeader(4,"Descripcion: ".$objRenglonJugador->descripcion);

    createHeader(1,"Tipo de ".createSpan("\$objRenglonJugador","red").": ".gettype($objRenglonJugador));

    createHeader(1,"Definiendo arreglo de jugadores:");

    $objRenglonJugador2 = new stdclass;

    $objRenglonJugador2 -> nombre = "Joao Mateo do Nascimento";
    $objRenglonJugador2 -> edad = 25;
    $objRenglonJugador2 -> deporte = "Futbol";
    $objRenglonJugador2 -> descripcion = "Jugaba al voleybol pero faltaba uno y dice ser brasileño. No le cree nadie. ";

    $renglonesJugadores = [];
    array_push($renglonesJugadores,$objRenglonJugador,$objRenglonJugador2);

    createHeader(1,createSpan("\$renglonesJugadores","red"));
    createHr();    

    foreach($renglonesJugadores as $item){
        createHeader(4,"Nombre: ".$item->nombre);
        createHeader(4,"Edad: ".$item->edad);
        createHeader(4,"Deporte: ".$item->deporte);
        createHeader(4,"Descripcion: ".$item->descripcion);
        createHr();
    }

    createHeader(2,"Cantidad de renglones : ".sizeof($renglonesJugadores));
    
    createHeader(1,"Produciendo objeto ".createSpan("\$objRenglonesJugadores","red"));

    $objRenglonesJugadores = new stdclass();

    $objRenglonesJugadores -> jugadores = $renglonesJugadores;
    $objRenglonesJugadores -> size = count($renglonesJugadores);

    createHeader(3,"Cantidad de renglones : ".$objRenglonesJugadores->size );

    createHeader(1, "Produciendo un JSON");

    $jsonRenglonesPedido = json_encode($objRenglonesJugadores);

    echo $jsonRenglonesPedido;

?> 