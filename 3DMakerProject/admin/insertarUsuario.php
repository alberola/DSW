<?php

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location: ../index.php");
    } 
    include "../php/connect.php";
    try{

        function limpiar($data){
            $data = trim($data);
            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }

        $nombre = limpiar($_POST['nombre']);
        $usuario = limpiar($_POST['usuario']);
        $contrasena = hash('sha256', limpiar($_POST['contrasena']));
        $email = limpiar($_POST['email']);
        $tipo = limpiar($_POST['tipo']);

        $conn->exec("INSERT INTO clientes VALUES (NULL, '$nombre', NULL, '$email', '$usuario', '$contrasena', NULL, NULL, NULL, NULL, NULL, NULL, '$tipo')");

        header("location:admin.php");
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage;
    }
    include '../php/close.php'; 
?>