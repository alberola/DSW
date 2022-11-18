<?php
     
    include  "../php/connect.php";

    try {
        $id = $_POST['productoBorrar'];
        $unLinkPhoto = $conn->query("SELECT imagen FROM imagenesproductos WHERE idproducto = $id;");
        while ($unLink = $unLinkPhoto->fetch (PDO::FETCH_BOTH /*FETCH_OBJ*/)){
            $nombreimagen = $unLink['imagen'];
            //Unlink para cargarnos las imagenes de la carpeta
            unlink('../photo/'.$nombreimagen);
        }
        $sql = $conn->exec("DELETE FROM imagenesproductos WHERE idproducto = $id;");
        $sql = $conn->exec("DELETE FROM productos WHERE id = $id;");
        header("location:index.php");
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage;
        echo "No se ha podido borrar el producto";
    }

    include '../php/close.php'; 
?>