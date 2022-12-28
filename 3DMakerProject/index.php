
    <!--Incluimos el header-->
    <?php include 'php/header.php'?>
    <!--Conexión a la base de datos-->
    <?php include 'php/connect.php'?>
    <hr>
    <?php
        $peticion = $conn->query("SELECT * FROM productos  INNER JOIN imagenesproductos on productos.id = imagenesproductos.idproducto
        and productos.activado = 1 group BY `productos`.`id` DESC;");
        $auxCarousel = 0;
    ?>
        <div class="container mt-5 mb-3">
            <div class="row">
    <?php while ($registro = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)) {?>
                <div class="col-sm-12 col-md-4 mb-5 carta-productos"id="producto<?php echo $auxCarousel;?>">
                    
                    <script>
                        document.getElementById('producto<?php echo $auxCarousel;?>').addEventListener('click', function(){
                            setTimeout(function () {
                                window.location.href = 'php/products.php?id='+<?php echo $registro['idproducto']; ?>; 
                            }, 100);
                        });

                    </script>

                    <div class='card-group' >
                        <div class='card ms-4 text-center img-fluid shadow' > 
                            <img src="photo/<?php echo $registro['imagen']; ?>" class='card-img-top' alt="Imagen Producto" style="height: 18rem" id="imgCard">
                            <div class='card-body'>
                                <h5 class="card-tittle"> <?php echo $registro["nombre"]; ?> </h5> 
                                <p class='card-price'> <?php echo $registro["precio"]; ?> €</p>
                                <a href='contacto.php' class='btn btn-dark'>Añadir al Carrito</a>
                            </div>
                        </div>
                    </div>
                </div> 
    <?php 
        $auxCarousel++;
        } 
    ?>
            </div>
        </div>
    <hr>
    <!-- Cerramos la conexión con la base de datos -->
    <?php include 'php/close.php'?>
    <!--Incluimos el footer-->
    <?php include 'php/footer.php'?>

