<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location: ../index.php");
    } 
    include "../php/connect.php";
        try {
            
            function limpiar($data){
                $data = trim($data);
                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }

            $nombre = limpiar($_POST['usuarioActualizar']);
            $contrasena  = limpiar($_POST['contrasenaUsuario']);
            $email = limpiar($_POST['emailUsuario']);
            $tipo = limpiar($_POST['tipoUsuarioActualizar']);
            $id = limpiar($_POST['idUsuario']);

            $sql = $conn->exec("UPDATE clientes SET nombre = '$nombre', contrasena = '$contrasena', email = '$email', tipo = '$tipo' WHERE id = $id;");

            header("location:admin.php");

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 

?>