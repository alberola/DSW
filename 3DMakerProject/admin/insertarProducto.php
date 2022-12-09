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

            $nombre = limpiar($_POST['nombre']);
            $descripcion  = limpiar($_POST['descripcion']);
            $precio = limpiar($_POST['precio']);
            $visible = limpiar($_POST['visible']);
            //Variable auxiliar para llevarnos variable de sesion id de usuario que inserta articulo
            $idAdmin = $_SESSION['id'];

            $sql = $conn->prepare("INSERT INTO productos VALUES (NULL, '$idAdmin', '$nombre','$descripcion', '$precio', '$visible')");
            $sql->execute();
            
            $bucle = count($_FILES['imagen']['tmp_name']);

            for ($i = 0; $i < $bucle; $i++) {

                if ($_FILES['imagen']['type'][$i] == "image/gif" || $_FILES['imagen']['type'][$i] == "image/jpeg" || $_FILES['imagen']['type'][$i] == "image/png" || $_FILES['imagen']['type'][$i] == "image/jpg"){
                    $rutaServidor = "../photo";
                    $rutaTemporal = $_FILES['imagen']['tmp_name'][$i];
                    $nombreImagen = $_FILES['imagen']['name'][$i];
                    $rutaDestino = $rutaServidor."/".$nombreImagen;
                    move_uploaded_file($rutaTemporal,$rutaDestino);
                }
                $conn->exec("INSERT INTO imagenesproductos VALUES (NULL, (SELECT id FROM productos ORDER BY id DESC LIMIT 1), '$nombreImagen', NULL,NULL)");
            }
            header("location:admin.php");
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage;
        }
    include '../php/close.php'; 
?>