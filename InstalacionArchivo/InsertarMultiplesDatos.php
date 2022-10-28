<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pruebaCrear";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Mary', 'Moe', 'mary@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Julie', 'Dooley', 'julie@example.com')");

        echo "Datos insertados correctamente";

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


?>