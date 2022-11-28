<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>3DMakerProject</title>
</head>
<body>

    <?php include '../php/connect.php';?>

    <h1 class="display-6 text-center mt-5">LOGEO</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="text-center mt-5">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="jorge"><br><br>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" placeholder="1234"><br><br>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>

    <?php 

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $_POST['usuario'];
            $contrasena = hash('sha256', $_POST['contrasena']);
            
            $_SERVER['PHP_AUTH_USER'] = $usuario;
            $_SERVER['PHP_AUTH_PW'] = $contrasena;
            $consulta = $conn->query("SELECT * FROM clientes;");
            $controlador = false;

            while ( $resultado = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                if ( $resultado['usuario'] == $_SERVER['PHP_AUTH_USER'] && $resultado['contrasena'] == $_SERVER['PHP_AUTH_PW']){
                    echo "<p class='text-center mt-5'>Login correcto :</p>";
                    echo "<p class='text-center'>Usuario = ". $_SERVER['PHP_AUTH_USER']."</p>";
                    echo "<p class='text-center'>Contraseña = ".$_SERVER['PHP_AUTH_PW']."</p>";
                    $controlador = true;
                    break;
                }
            }
            if (!$controlador){
                echo "<p class='text-center mt-5'>Datos incorrectos.</p>";
            }
        }

        include '../php/close.php';
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>