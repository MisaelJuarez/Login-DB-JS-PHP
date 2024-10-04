<?php
    session_start(); 
    session_unset(); //liberamos la session actual
    session_destroy(); //destruimos la session

    echo json_encode([1,"Session finalizada"]);
?>