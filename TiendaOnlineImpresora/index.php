
    <!--Incluimos el header-->
    <?php include 'php/header.php'?>
    <!--Conexión a la base de datos-->
    <?php include 'php/connect.php'?>
    <h1 class="text-center display-6 m-2">Cuerpo de la página</h1>
    <?php
        $peticion = $conn->query("SELECT * FROM PRODUCTOS  INNER JOIN imagenesproductos on productos.id = imagenesproductos.idproducto
         and productos.activado = '1' and EXISTENCIAS > 0 group BY `productos`.`id` DESC");
         echo "<div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col-9'><div class='card-group'>";
        while ($registro = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)) {
            echo "<div class='card ms-4 text-center' style='width: 18rem;'>";
                echo "<img src='photo/". $registro['imagen']. "' class='card-img-top'>";
                echo "<div class='card-body'>";
                    echo "<h5 class='card-tittle'>" . $registro["nombre"] . "</h5>";
                    echo "<p class='card-text'>".$registro["descripcion"]."</p>";
                    echo "<p class='card-price'>" . $registro["precio"]. "€</p>"; 
                    echo "<a href='#' class='btn btn-dark'>Comprar</a>";
                echo "</div>";
            echo "</div>";   
        }
        echo "</div></div>
                <div class='col'></div>
                </div>
            </div>";
    ?>
    <!-- Cerramos la conexión con la base de datos -->
    <?php include 'php/close.php'?>
    <!--Incluimos el footer-->
    <?php include 'php/footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
