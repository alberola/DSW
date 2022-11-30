<?php

    include "../php/connect.php";
        try {
            
            $nombre = $_POST['nombreActualizar'];
            $descripcion  = $_POST['descripcionActualizar'];
            $precio = $_POST['precioActualizar'];
            $visible = $_POST['visibleActualizar'];
            $id = $_POST['idActualizar'];

            $sql = $conn->exec("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, activado = $visible WHERE id = $id;");

            //$conn->exec("UPDATE imagenesproductos VALUES (NULL, (SELECT ID FROM PRODUCTOS ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
            header("location:admin.php");

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 

?>