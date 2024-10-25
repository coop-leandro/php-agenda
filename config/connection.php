<?php
    $host = "localhost";
    $dbname = "agenda";
    $user = "coop-leandro";
    $pass = "viveocampo";

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        // MODULO DE ERROS //
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "erro: $error";
    }