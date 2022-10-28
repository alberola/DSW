<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pruebaCrear";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE pruebaCrear";

        $conn->exec($sql);
        echo "Tabla creada correctamente.<br/>";
    }   catch (PDOException $e) {

        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>