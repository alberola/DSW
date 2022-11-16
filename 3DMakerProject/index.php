
    <!--Incluimos el header-->
    <?php include 'php/header.php'?>
    <!--Conexión a la base de datos-->
    <?php include 'php/connect.php'?>
    <h1 class="text-center display-6 m-2">Cuerpo de la página</h1>
    <?php
        $peticion = $conn->query("SELECT * FROM PRODUCTOS  INNER JOIN imagenesproductos on productos.id = imagenesproductos.idproducto
        and productos.activado = 1 group BY `productos`.`id` DESC");
    ?>
        <div class="container mt-3 mb-3">
            <div class="row">
    <?php while ($registro = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)) {?>
                <div class="col-6 col-md-4 mb-5">
                    <div class='card-group'>
                        <div class='card ms-4 text-center' style='width: 18rem;'>
                            <img src="photo/<?php $registro['imagen'] ?>" class='card-img-top' alt="Imagen Producto">
                            <div class='card-body'>
                                <h5 class="card-tittle"> <?php $registro["nombre"] ?> </h5>
                                <p class='card-text'> <?php $registro["descripcion"] ?> </p>
                                <p class='card-price'> <?php $registro["precio"] ?> €</p>
                                <a href='#' class='btn btn-dark'>Comprar</a>
                            </div>
                        </div>
                    </div>
                </div> 
    <?php } ?>
            </div>
        </div>

    <!-- Cerramos la conexión con la base de datos -->
    <?php include 'php/close.php'?>
    <!--Incluimos el footer-->
    <?php //include 'php/footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
