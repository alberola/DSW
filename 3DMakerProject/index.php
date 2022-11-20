
    <!--Incluimos el header-->
    <?php include 'php/header.php'?>
    <!--Conexión a la base de datos-->
    <?php include 'php/connect.php'?>

    <?php
        $peticion = $conn->query("SELECT * FROM productos  INNER JOIN imagenesproductos on productos.id = imagenesproductos.idproducto
        and productos.activado = 1 group BY `productos`.`id` DESC;");
        $auxCarousel = 0;
    ?>
        <div class="container mt-5 mb-3 mt-3">
            <div class="row">
    <?php while ($registro = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)) {?>
                <div class="col-sm-12 col-md-4 mb-5 "id="producto" >
                    <div class='card-group'>
                        <div class='card ms-4 text-center img-fluid shadow' style="height:575px"> 
                            <div id="carouselExampleControls<?php echo $auxCarousel;?>" class="carousel slide" data-bs-interval="false" data-ride="carousel" data-pause="hover">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="photo/<?php echo $registro['imagen']; ?>" class='card-img-top' alt="Imagen Producto" style="height: 350px" id="imgCard">
                                    </div>
                                    <?php 
                                        $aux = $registro['idproducto'];
                                        $noRepeat = $registro['imagen'];
                                        $imagenes = $conn->query("SELECT imagen FROM imagenesproductos WHERE (idproducto = $aux) and (imagen != '$noRepeat');");
                                        while ($registroImagenes = $imagenes ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)) {
                                    ?>
                                    <div class="carousel-item">
                                        <img src="photo/<?php echo $registroImagenes['imagen']; ?>" class='card-img-top' alt="Imagen Producto" style="height: 350px" id="imgCard">
                                    </div>
                                    <?php } ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?php echo $auxCarousel;?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?php echo $auxCarousel;?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class='card-body'>
                                <h5 class="card-tittle"> <?php echo $registro["nombre"]; ?> </h5> 
                                <p class='card-text'> <?php echo $registro["descripcion"]; ?> </p>
                                <p class='card-price'> <?php echo $registro["precio"]; ?> €</p>
                                <a href='#' class='btn btn-dark'>Realizar Pedido</a>
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

    <!-- Cerramos la conexión con la base de datos -->
    <?php include 'php/close.php'?>
    <!--Incluimos el footer-->
    <?php include 'php/footer.php'?>
