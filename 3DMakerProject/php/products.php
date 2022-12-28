<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/2693d594e9.js" crossorigin="anonymous"></script>
    <title>3DMakerProject</title>
</head>
<body>
    <?php session_start();?>
    <!-- INICIO DEL HEADER -->
    <nav class="navbar navbar-expand-lg">
        <div class="container mt-3  ">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="Logo" height="100px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
                    <a class="nav-link" href="../contacto.php">Contacto</a>
                </div>
            </div>
            <div class="d-flex" id="usuarios">
                <?php
                    if (!isset($_SESSION['usuario'])) {
                        echo "<a href='../admin/index.php'>
                                <img src='../img/usuario.png' alt='logo' height='30px'>
                            </a>";
                    } else {
                        ?>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../img/usuario.png" alt="hugenerd" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['usuario'];?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <?php
                                    if ($_SESSION['tipo'] == 'admin'){
                                        echo "<li><a class='dropdown-item' href='../admin/admin.php'>Panel de Control</a></li>";
                                    } else if ($_SESSION['tipo'] == 'colaborador'){
                                        echo "<li><a class='dropdown-item' href='../admin/colaborador.php'>Panel de Control</a></li>";
                                    }
                                ?>
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../admin/cerrarSesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                <a href="index.php">
                    <img src="../img/carro.png" alt="" height="30px">
                </a>
            </div>
        </div>
    </nav>
    
    <!-- FIN DEL HEADER -->

    <hr>
    
    <!-- INICIO DEL BODY -->

    <?php
        include 'connect.php';
        $id=$_GET['id'];
        $peticion= $conn->query("SELECT * FROM productos INNER JOIN imagenesproductos ON productos.id = imagenesproductos.idproducto and productos.id = $id;");
        $peticion2 = $conn->query("SELECT * FROM productos where id=$id;");
    ?>
            <div class='container my-5'>
                <div class='row'>
                    <div class='col-12'>
                        <div class="card mb-3 shadow" style="height: 600px;" >
                            <div class="row g-0">
                                <div class="col-md-6">
    <?php 
        while ($producto2 = $peticion2 ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){ 
    ?>
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                                                   
    <?php
            while ($producto = $peticion ->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
    ?> 
                                        <div class="carousel-inner">
                                            <div class="carousel-item">
                                                <img src="../img/facebook1.png" class="img-fluid" alt="Imagenes Producto">
                                            </div>
                                        </div>      
    <?php
            }               //TODA LA IDENTACIÓN REALIZADA EN HTML PARA NO ENCONTRAR ERRORES CON LAS POSIBLES ''
    ?>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                    <h3 class="card-title text-center"><?php echo $producto2["nombre"]; ?></h3>
                                    <p class="card-text"> <?php echo $producto2["descripcion"]; ?></p>
                                    <p class="card-price"><?php echo $producto2["precio"]; ?> €</p>
                                    <a href='#' class='btn btn-dark'>Añadir al carrito</a>
                                    <p class="card-text"><small class="text-muted">Recuerda que todos los precios de nuestra plataforma son orientativos</small></p>
                                    </div>
                                </div>
    <?php 
        } 
    ?>                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
        include 'close.php';
    ?>

    <!-- FIN DEL BODY -->

    <hr>

    <!-- INICIO DEL FOOTER -->

    <div class="container-fluid text-center">
            <div class="row ">
                <div class="offset-sm-0 offset-md-1 col-12 col-md-5">
                <p class="h5 mb-3 pt-3">Donde localizarnos</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d520.4362497196988!2d-17.923774727116744!3d28.65780787304748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc6bf3dc7a30c7ab%3A0x15a751d7b05f2b58!2sC.%20los%20Molinos%2C%2015%2C%2038768%20Los%20Llanos%2C%20Santa%20Cruz%20de%20Tenerife!5e0!3m2!1ses!2ses!4v1668967053278!5m2!1ses!2ses" width="300" height="150" style="border:0;" class="shadow" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 mb-4 col-md-5">
                    <p class="h5 mb-3 pt-3">Redes Sociales</p>
                    <div class="row justify-content-center mt-5">
                        <div class=" col-4 col-md-2 " >
                            <a href="https://www.instagram.com/3dmakerproject/?next=%2F3dmakerproject%2F" target="_blank" class="mt-5"><img src="../img/instagram.png"width="40px"></a>
                        </div>
                        <div class="col-4 col-md-2">
                            <a href="https://twitter.com/3dMakerProject" target="_blank"><img src="../img/twitter.png" width="40px"></a>
                        </div>
                        <div class="col-4 col-md-2">
                            <a href="https://www.facebook.com/3dmakerproject/" target="_blank"><img src="../img/facebook1.png"width="40px"></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-3 text-dark" >
                    <h6 class="text-center">Copyright © 3DMakerProject <?php  echo $year = date("Y");?>. All rights reserved</h6>
                </div>
            </div>
        </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
    <!-- FIN DEL FOOTER -->
</html>