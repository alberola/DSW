<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>3DMakerProject</title>
</head>
<body>

    <?php 
        session_start();
        include '../php/connect.php';
        if (isset($_SESSION['usuario'])) {
            header("location: admin.php");
        } 
    ?>

    <div class="container caja">
        <div class="row">
            <div class="col-12 col-md-5 text-center">
                <a href="../index.php"><img src="../img/logo.png" alt="Logo"></a>
            </div>
            <div class="col-12 col-md-7">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="mt-5">
                    <h5><label for="usuario" class="form-label">Usuario</label></h5>
                    <input type="text" name="usuario" placeholder="jorge" class="form-control"><br>
                    <h5><label for="contrasena" class="form-label">Contraseña</label></h5>
                    <input type="password" name="contrasena" placeholder="1234" class="form-control"><br>
                    <a href="registro.php" class="text-dark">¿No eres usuario todavia?</a><br><br>
                    <input type="submit" value="Iniciar Sesión" class="btn btn-dark"><br><br>
                </form>
            </div>
        </div>
    </div>

    <?php 
        if (isset($_SESSION['tipo'])){
            header("location: admin.php");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){


            function limpiar($data){
                $data = trim($data);
                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }

            $usuario = limpiar($_POST['usuario']);
            $contrasena = limpiar(hash('sha256', $_POST['contrasena']));
                
            $consulta = $conn->query("SELECT * FROM clientes;");
            $controlador = false;

            while ( $resultado = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                if ( $resultado['usuario'] == $usuario && $resultado['contrasena'] == $contrasena && $resultado['tipo'] == 'admin'){
                    $_SESSION['usuario'] = $resultado['usuario'];
                    $_SESSION['id'] = $resultado['id'];
                    $_SESSION['tipo'] = $resultado['tipo'];
                    $controlador = true;
                    header("refresh:0.5;url=admin.php");
                } else if ($resultado['usuario'] == $usuario && $resultado['contrasena'] == $contrasena && $resultado['tipo'] == 'colaborador') {
                    $_SESSION['usuario'] = $resultado['usuario'];
                    $_SESSION['id'] = $resultado['id'];
                    $_SESSION['tipo'] = $resultado['tipo'];
                    $controlador = true;
                    header("refresh:0.5;url=colaborador.php");
                } else if ($resultado['usuario'] == $usuario && $resultado['contrasena'] == $contrasena && $resultado['tipo'] == 'cliente'){
                    $_SESSION['usuario'] = $resultado['usuario'];
                    $_SESSION['tipo'] = $resultado['tipo'];
                    $controlador = true;
                    header("refresh:0.5;url=../index.php");
                }
            }
            if (!$controlador){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'El usuario o la contraseña son incorrectos!',
                        html:'Vuelve a intentarlo nuevamente cuando lo hayas hecho',
                        confirmButtonColor: '#2b2b2a', 
                    })
                </script>";
            }
        }

        include '../php/close.php';
    
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>