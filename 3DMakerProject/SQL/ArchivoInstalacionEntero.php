<?php

    /**Definicion de las variables que se usarán a lo largo del archivo de instalación*/

    //Variables de usuario Root
    $servername = "localhost";
    $username = "root";
    $password = "";

    //Nombre de la base de datos a crear

    $dbname = "3DMakerProject";
    //Variables de usuario admin para trabajar con el
    $adminUserName = "admin";
    $adminPassword = "1234";

    //Ruta del archivo sql el que posee tablas y datos de las mismas.
    $sqlpath = "tienda3DMaker.sql";

    //Ejecutamos las funciones
    instalacionArchivo($servername,$username,$password,$adminUserName,$adminPassword,$dbname);
    crearTablas($servername, $adminUserName, $adminPassword, $dbname, $sqlpath);

    //Función para crear la base de datos y usuarios
    function instalacionArchivo($servername,$username,$password,$adminUserName,$adminPassword,$dbname){
        try{
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            echo "<span style='color:green;'>Conexión exitosa con el usuario " . $username . "<br>";

            $sql = "CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
            $sql .= "CREATE USER IF NOT EXISTS  '$adminUserName'@'$servername' IDENTIFIED BY '$adminPassword';";
            $sql .= "GRANT ALL PRIVILEGES ON $dbname.* TO '$adminUserName' WITH GRANT OPTION;";

            $conn->exec($sql);
            echo "Se ha creado la base de datos : <strong> $dbname</strong><br>";
            echo "Se ha creado el usuario : <strong> $adminUserName</strong></span><br>";
        } catch (PDOException $e) {
            echo "<span style='color:red;'>Error:". $e->getmessage()."</span><br>";
        }

        $conn = null;
    }

    //Función para crear tablas desde el archivo .sql
    function crearTablas($servername, $adminUserName, $adminPassword, $dbname, $sqlpath) {
        try{
            //Crear con la base de datos
            $conn = new PDO("mysql:host=$servername", $adminUserName, $adminPassword);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Imprimiremos según se vaya realizando las creaciones en color verder para ver si se ha realizado correctamente
            echo "<span style='color:green;'>Conexión exitosa con el usuario " . $adminUserName . "<br>";

            $sql = "USE $dbname";
            $conn -> exec($sql);

            //cargamos el contenido del fichero tables.sql
            $sql = file_get_contents($sqlpath);
            $conn -> exec($sql);

            //Imprimirá si se ha realizado correctamente
            echo "Tablas creadas a partir del archivo ". $sqlpath . " <br>";
            echo "Instalación completada correctamente</span>";
            header("refresh:1;url=../index.php");
        } catch (PDOException $e) {
            echo "<span style='color:red;'>Error:". $e->getmessage()."</span><br>";
        }
        $conn = null;
    }

?>