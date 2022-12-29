
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
                <div class="col-sm-12 col-md-4 mb-5 carta-productos">
                    <div class='card-group' >
                        <div class='card ms-4 text-center img-fluid shadow'> 
                            <img src="photo/<?php echo $registro['imagen']; ?>" class='imgCard card-img-top rounded' alt="Imagen Producto" style="height: 18rem" id="producto<?php echo $auxCarousel;?>">
                            <script>
                                document.getElementById('producto<?php echo $auxCarousel;?>').addEventListener('click', function(){
                                    setTimeout(function () {
                                        window.location.href = 'php/products.php?id='+<?php echo $registro['idproducto']; ?>; 
                                    }, 100);
                                });
                            </script>
                            <div class='card-body'>
                                <h5 class="card-tittle"> <?php echo $registro["nombre"]; ?> </h5> 
                                <p class='card-price'> <?php echo $registro["precio"]; ?> €</p>
                                <a href='#' class='btn btn-dark' data-bs-toggle="modal" data-bs-target="#idModal">Añadir al Carrito</a>
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
    <div class="modal fade" id="idModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Cerramos la conexión con la base de datos -->
    <?php include 'php/close.php'?>
    <!--Incluimos el footer-->
    <?php include 'php/footer.php'?>

