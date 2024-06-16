<?php
    include('../Utilities.inc');
    $word = $_GET['word'];
    $shaWord = sha1($word);
    $mdWord = md5($word); 

    createHeader(3,"Palabra encriptada en MD-5: " . createSpan($shaWord,"red"));
    createHeader(3,"Palabra encriptada en SHA-1: " . createSpan($mdWord,"red"));
     
 ?>