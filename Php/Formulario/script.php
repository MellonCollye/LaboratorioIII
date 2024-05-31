<?php
    include('../Utilities.inc');

     createHeader(3,"Nombre : " . createSpan($_GET['nombre'],"red"));
     
     createHeader(3,"Edad : " . createSpan($_GET['edad'],"red"));
?>