<!--Conexión a la base de datos-->
<?php
    $servername = 'localhost';
    $username = 'admin';
    $password = 'admin1234';
    $dbname = '3dmakerProject';
    $dbnameTest = "pruebaalejandro";
    try{
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e){
        echo $e->getMessage();
    }
?>