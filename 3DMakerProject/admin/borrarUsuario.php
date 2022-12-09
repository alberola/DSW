<?php
     session_start();
     if (!isset($_SESSION['usuario'])) {
         header("location: ../index.php");
     } 
    include  "../php/connect.php";

    try {
        //Para que no de errores comprobamos si se ha pulsado sin seleccionar ningún usuario
        if ($_POST['usuarioBorrar'] == 'X'){
            header("location:pruebaMenu.php");
        }
        $id = $_POST['usuarioBorrar'];
        $sql = $conn->exec("DELETE FROM clientes WHERE id = $id;");
        header("location:admin.php");
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage;
    }

    include '../php/close.php'; 
?>