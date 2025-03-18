<?php 
    // MODO ONLINE:
        // $dbHost = 'mysql';
        // $dbUserName = 'u842091117_salvatore'; 
        // $dbPassword = 'Deyvidbrasil1!';
        // $dbName = 'u842091117_squareshow';
    // MODO ONLINE:

    // MODO LOCALHOST:
        $dbHost = 'localhost';
        $dbUserName = 'root';
        $dbPassword = 'Dwdbrasiloficial12!';
        $dbName = 'urna';
    // MODO LOCALHOST:


    $conexao = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

    if($conexao->connect_errno){
        die('Falha ao conectar ao banco de dados '. $conexao->connect_error);
    }
