<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baseDatosPrueba";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname . ;

        $sql .= "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin1234'";

        $sql .= "GRANT ALL PRIVILEGIES ON $dbname.* TO 'admin'@'localhost' WITH GRANT OPTION;";


    } catch (\Exception $e) {

    }



?>
