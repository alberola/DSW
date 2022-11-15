<?php
    include 'header.php';
    include 'connect.php';
    
    $id=$_GET['id'];
    $peticion= $conn->query("SELECT * FROM productos INNER JOIN imagenesproductos ON productos.id = imagenesproductos.idproducto AND productos.existencias >0 and productos.id = $id;");
    $peticion2 = $conn->query("SELECT * FROM productos where id=$id;");
    echo "<div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col-9'><div class='card' style='width: 18rem;'>";
    while ($producto2 = $peticion2 ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                while ($producto = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                    echo "<img src='../photo/". $producto['imagen']. "' class='card-img-top img-fluid'>";
                }
                echo "<div class='card-body'>";
                    echo "<h5 class='card-tittle'>" . $producto2["nombre"] . "</h5>";
                    echo "<p class='card-text'>".$producto2["descripcion"]."</p>";
                    echo "<p class='card-price'>" . $producto2["precio"]. "€</p>"; 
                    echo "<a href='#' class='btn btn-dark'>Comprar</a>";
                    echo "<a href='../index.php' class='btn btn-dark m-2'>Volver</a>";
                echo "</div>";
            echo "</div>";   
    }
    echo "</div></div>
                <div class='col'></div>
                </div>
            </div>";
    include 'close.php';
?>