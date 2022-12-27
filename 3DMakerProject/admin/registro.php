<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" />
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>3DMakerProject</title>
</head>
<body>

    <?php include '../php/connect.php';?>

    <div class="container cajaRegistro">
        <div class="row">
            <div class="col-12 col-md-5 text-center">
                <a href="../index.php"><img src="../img/logo.png" alt="Logo" id="imagen"></a>
            </div>
            <div class="col-12 col-md-7" id="cajaRegistro">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5">
                    <div class="row">
                        <div class="col-6">
                            <h5><label for="nombre" class="form-label ">Nombre</label></h5>
                            <input type="text" name="nombre" class="form-control input-sm">
                        </div>
                        <div class="col-6">
                            <h5><label for="apellidos" class="form-label">Apellidos</label></h5>
                            <input type="text" name="apellidos" class="form-control input-sm"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5><label for="usuario" class="form-label">Usuario</label></h5>
                            <input type="text" name="usuario" class="form-control"><br>
                        </div>
                        <div class="col-6">
                            <h5><label for="contrasena" class="form-label">Contraseña</label></h5>
                            <input type="password" name="contrasena" class="form-control"><br>
                        </div>
                    </div>
                    <h5><label for="email" class="form-label">Email</label></h5>
                    <input type="email" name="email" class="form-control"><br>
                    <div class="row">
                        <div class="col-6">
                            <h5><label for="telefono" class="form-label">Telefono</label></h5>
                            <input type="number" name="telefono" class="form-control"><br>
                        </div>
                        <div class="col-6">
                            <h5><label for="codigoPostal" class="form-label">Código Postal</label></h5>
                            <input type="number" name="codigoPostal" class="form-control" autocomplete="off"><br>
                        </div>
                    </div>
                    <h5><label for="direccion" class="form-label">Dirección</label></h5>
                    <input type="text" name="direccion" class="form-control"><br>
                    <div class="row">
                        <div class="col-6">
                            <h5><label for="poblacion" class="form-label">Población</label></h5>
                            <input type="text" name="poblacion" class="form-control"><br>
                        </div>
                        <div class="col-6">
                            <h5><label for="pais" class="form-label">Pais</label></h5>
                            <input type="text" name="pais" class="form-control"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5><label for="dni" class="form-label">Dni</label></h5>
                            <input type="text" name="dni" class="form-control"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check col-12 ">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Acepto los términos y condiciones
                            </label>
                        </div>
                    </div><br>
                    <input type="submit" value="Registrarse" class="btn btn-dark"><br><br>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<?php
    function limpiar($data){
        $data = trim($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nombre = limpiar($_POST['nombre']);
        $apellidos = limpiar($_POST['apellidos']);
        $usuario = limpiar($_POST['usuario']);
        $contrasena = hash('sha256', limpiar($_POST['contrasena']));
        $email = limpiar($_POST['email']);
        $telefono = limpiar($_POST['telefono']);
        $codigoPostal = limpiar($_POST['codigoPostal']);
        $direccion = limpiar($_POST['direccion']);
        $poblacion = limpiar($_POST['poblacion']);
        $pais = limpiar($_POST['pais']);
        $dni = limpiar ($_POST['dni']);
        
        if (empty($nombre) || empty($apellidos) || empty($usuario) || empty($contrasena) || empty($email) || empty($telefono) || empty($codigoPostal) || empty($direccion) || empty($poblacion) || empty($pais) || empty($dni)){
            
            //En caso de que no respondamos todos los campos
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No has contestado todos los campos!',
                        html:'Vuelve a intentarlo nuevamente cuando lo hayas hecho.',
                        confirmButtonColor: '#2b2b2a', 
                    })
                </script>";
        } else {
            
            try {

                //Preparamos la consulta para evitar inyecciones SQL
                $consulta = $conn->prepare("SELECT usuario FROM clientes where usuario = ?;");
                //Para evitar inyecciones SQL
                $consulta->bindParam(1, $usuario);
                //Ejecutamos la consulta
                $consulta -> execute();

                if ($consulta->rowCount() == 1){
                    echo "<script>
                        Swal.fire({
                        icon: 'error',
                        title: 'El usuario que ha intentado usar ya se encuentra en uso.',
                        confirmButtonColor: '#2b2b2a', 
                        })
                    </script>";
                } else {
                    $sql = $conn->prepare("INSERT INTO clientes VALUES (null, '$nombre','$apellidos', '$email', '$usuario', '$contrasena', '$telefono', '$direccion', '$codigoPostal', '$poblacion', '$pais', '$dni', 'cliente')");
                    $sql->execute();

                    //Script para notificar que el usuario se ha insertado correctamente.
                    echo "<script>
                        Swal.fire({
                        icon: 'sucess',
                        title: 'Usuario insertado correctamente',
                        confirmButtonColor: '#2b2b2a', 
                        })
                    </script>";

                    //JS para redireccionar sin que de error. (HEADER LOCATION NO FUNCIONA)
                    echo "<script>
                            setTimeout(function () {
                                window.location.href = 'index.php'; 
                            }, 1000);
                        </script>";   
                }

            } catch (PDOException $e) {
                //echo "Error: ".$e->getMessage;
            }
        }
    }
    include '../php/close.php'; 
?>
</html>
