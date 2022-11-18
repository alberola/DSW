<?php

    include "../php/connect.php";
        try {
            $nombre = $_POST['nombre'];
            $descripcion  = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $visible = $_POST['visible'];
            $id = $_POST['productoActualizar'];

                $sql = $conn->exec("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, activado = $visible WHERE id = $id;");

                if ($_FILES['imagen']['type'] == "image/gif" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/jpg"){
                    $rutaServidor = "../photo";
                    $rutaTemporal = $_FILES['imagen']['tmp_name'];
                    $nombreImagen = $_FILES['imagen']['name'];
                    $rutaDestino = $rutaServidor."/".$nombreImagen;
                    move_uploaded_file($rutaTemporal,$rutaDestino);
                }
                //$conn->exec("UPDATE imagenesproductos VALUES (NULL, (SELECT ID FROM PRODUCTOS ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
                header("location:index.php");

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 

?>