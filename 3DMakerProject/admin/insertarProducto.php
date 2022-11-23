<?php 
    include "../php/connect.php";
        try {
            $nombre = $_POST['nombre'];
            $descripcion  = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $visible = $_POST['visible'];

            $sql = $conn->prepare("INSERT INTO productos VALUES (null, '$nombre','$descripcion', '$precio', '$visible')");
            $sql->execute();
            
            if ($_FILES['imagen']['type'] == "image/gif" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/jpg"){
                $rutaServidor = "../photo";
                $rutaTemporal = $_FILES['imagen']['tmp_name'];
                $nombreImagen = $_FILES['imagen']['name'];
                $rutaDestino = $rutaServidor."/".$nombreImagen;
                move_uploaded_file($rutaTemporal,$rutaDestino);
            }
            $conn->exec("INSERT INTO imagenesproductos VALUES (NULL, (SELECT ID FROM PRODUCTOS ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
            echo "Producto Insertado";
            header("location:index.php");
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 
?>