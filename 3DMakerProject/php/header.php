<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/2693d594e9.js" crossorigin="anonymous"></script>
    <title>3DMakerProject</title>
</head>
<body>
    <?php session_start();?>
    <nav class="navbar navbar-expand-lg">
        <div class="container mt-3  ">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Logo" height="100px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </div>
            </div>
            <div class="d-flex" id="usuarios">
                <?php
                    if (!isset($_SESSION['usuario'])) {
                        echo "<a href='admin/index.php'>
                                <img src='img/usuario.png' alt='logo' height='30px'>
                            </a>";
                    } else {
                        ?>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/usuario.png" alt="hugenerd" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['usuario'];?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <?php
                                    if ($_SESSION['tipo'] == 'admin'){
                                        echo "<li><a class='dropdown-item' href='admin/admin.php'>Panel de Control</a></li>";
                                    } else if ($_SESSION['tipo'] == 'colaborador'){
                                        echo "<li><a class='dropdown-item' href='admin/colaborador.php'>Panel de Control</a></li>";
                                    }
                                ?>
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="admin/cerrarSesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                <a href="index.php">
                    <img src="img/carro.png" alt="" height="30px">
                </a>
            </div>
        </div>
    </nav>