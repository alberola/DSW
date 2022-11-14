<?php
    include 'header.php';
    include 'connect.php';
    
    $id=$_GET['id'];
    $peticion= $conn->query("SELECT * FROM productos INNER JOIN imagenesproductos ON productos.id = imagenesproductos.idproducto AND productos.existencias >0 and productos.id = $id;");
    $peticion2 = $conn->query("SELECT * FROM productos WHERE id=$id;");
    //EMPEZAMOS A METER LAS ETIQUETAS DE LAS CAJAS DE LOS PRODUCTOS
    echo "<div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col-9'><div class='card m-5' style='width: 18rem;'>";
    //BUCLE PARA METER ATRIBUTOS DEL OBJETO (SACAR DATOS DE BASE DE DATOS)
    while ($producto2 = $peticion2 ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
        //PRIMERA PARTE DEL SLITHER
        echo "<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
                    <div class='carousel-inner'>";
                //BUCLE PARA METER TODAS LAS IMAGENES DEL PRODUCTO
                while ($producto = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                    //CARGAMOS LAS DEMÁS IMAGENES DEL SLITHER
                      //echo "<div class='carousel-item'>
                      echo "<img src='../photo/". $producto['imagen']. "' class='d-block card-img-top img-fluid'>";
                      //</div>";
                }
                //PARTE DE BOTONES DEL SLITHER
                /* echo "</div>
                        <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='visually-hidden'>Previous</span>
                        </button>
                        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='visually-hidden'>Next</span>
                        </button>
                    </div>";
                */
                //SEGUNDA PARTE DE LA CARTA DEL PRODUCTO DONDE DESPUÉS DE LA IMAGEN METEMOS LOS DATOS
                echo "<div class='card-body'>";
                    echo "<h5 class='card-tittle'>" . $producto2["nombre"] . "</h5>";
                    echo "<p class='card-text'>".$producto2["descripcion"]."</p>";
                    echo "<p class='card-price'>" . $producto2["precio"]. "€</p>"; 
                    echo "<a href='#' class='btn btn-dark'>Comprar</a>";
                    echo "<a href='../index.php' class='btn btn-dark m-2'>Volver</a>";
                echo "</div>";
            echo "</div>";   
    }
    //SE CIERRAN TODAS LAS ETIQUETAS DE LOS DISTINTOS PRODUCTOS
    echo "</div></div>
                <div class='col'></div>
                </div>
            </div>";
    include 'close.php';
?>