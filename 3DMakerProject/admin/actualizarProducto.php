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

            $nombre = limpiar($_POST['nombreActualizar']);
            $descripcion  = limpiar($_POST['descripcionActualizar']);
            $precio = limpiar($_POST['precioActualizar']);
            $visible = limpiar($_POST['visibleActualizar']);
            $id = limpiar($_POST['idActualizar']);


            $sql = $conn->exec("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, activado = $visible WHERE id = $id;");

            //$conn->exec("UPDATE imagenesproductos VALUES (NULL, (SELECT ID FROM PRODUCTOS ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
            header("location:admin.php");

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 

?>