<?php

function connectToDB()
{

    $host = "mysql8";
    $user = "myuser";
    $pw = "monpassword";
    $db = "tutoseu";
    
    try {

        $dbco = new PDO("mysql:host=$host;dbname=$db", $user, $pw);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connecté à la BBD : articles";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    return $dbco;
}