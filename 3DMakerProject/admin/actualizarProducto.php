<?php

    include "../php/connect.php";
        try {
            $nombre = $_POST['nombre'];
            $descripcion  = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $visible = $_POST['visible'];
            $id = $_POST['productoActualizar'];

            $sql = $conn->exec("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, activado = $visible WHERE id = $id;");

                //$conn->exec("UPDATE imagenesproductos VALUES (NULL, (SELECT ID FROM PRODUCTOS ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
                header("location:index.php");

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 

?>