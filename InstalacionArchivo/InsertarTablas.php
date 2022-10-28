<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pruebaCrear";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
             VALUES ('John', 'Doe', 'john@example.com')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Datos insertados correctamente";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>