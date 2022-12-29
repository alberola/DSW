<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://kit.fontawesome.com/2693d594e9.js" crossorigin="anonymous"></script>
    <title>3DMakerProject</title>
</head>
<body>
<?php 
    session_start();
    if (!(isset($_SESSION['usuario'])) || $_SESSION['tipo'] == 'cliente') {
        header("location: ../index.php");
    } 
    if ($_SESSION['tipo'] == 'colaborador'){
        header("location:colaborador.php");
    }
    include '../php/connect.php';
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">   
                <a class="navbar-brand text-center" href="../index.php"><img src="../img/logo.png" alt="Logo" height="100px"></a>            
                    <h5 class="fs-5 d-none d-sm-inline text-white text-decoration-none">Panel de Control</h6>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2 text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Productos</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 text-white" onclick="mostrarProductosDiv()"> <span class="d-none d-sm-inline text-white">Mostrar Productos</span> <i class="bi bi-table"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="anadirProductosDiv()"> <span class="d-none d-sm-inline text-white">Añadir Productos</span> <i class="bi bi-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="borrarProductosDiv()"> <span class="d-none d-sm-inline text-white">Borrar Productos</span><i class="bi bi-trash"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="actualizarProductosDiv()"> <span class="d-none d-sm-inline text-white">Actualizar Productos</span> <i class="bi bi-chevron-bar-contract"></i></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Usuarios</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 text-white" onclick="mostrarUsuariosDiv()"> <span class="d-none d-sm-inline text-white">Mostrar Usuarios</span> <i class="bi bi-table"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="anadirUsuariosDiv()"> <span class="d-none d-sm-inline text-white">Añadir Usuarios</span><i class="bi bi-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="borrarUsuariosDiv()"> <span class="d-none d-sm-inline text-white">Borrar Usuarios</span><i class="bi bi-trash"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white" onclick="actualizarUsuariosDiv()"> <span class="d-none d-sm-inline text-white">Actualizar Permisos</span> <i class="bi bi-chevron-bar-contract"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../img/usuario.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['usuario'];?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3 mx-5" id="prueba">
            <div class="col-md-12 mt-5" id="mostrarProductos">
                <?php
                    include '../php/connect.php';
                    $consulta = $conn->query("SELECT * FROM productos;");
                    ?>
                <table class='table table-hover'>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Visible</th>
                        <th>Precio</th>
                        <th>Creador</th>
                    </tr>
                <?php
                while ($productos = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                ?>
                    <tr>
                        <td><?php echo $productos['nombre'];?></td>
                        <td><?php echo $productos['descripcion'];?></td>
                        <td><?php echo (($productos['activado'] == 1)?'Si':'No');?></td>
                        <td><?php echo $productos['precio'];?></td>
                        <td>
                            <?php 
                                //Select efectuado para obtener el nombre a partir del idAdmin que tenemos
                                $idCreador = $productos['idadmin'];
                                $creador = $conn->prepare("SELECT usuario FROM clientes where id = ?;");
                                $creador ->bindParam(1, $idCreador);
                                $creador -> execute();
                                $resultado = $creador->fetch();
                                echo $resultado['usuario'];
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </table>
            </div>
            <div class="col-12  mt-5" id="anadirProductos">
                <h2 class=" text-center">Añadir Productos</h2>
                <form method="post" action="insertarProducto.php" name="submit" enctype="multipart/form-data">
                    <h5><label for="nombre" class="form-label">Nombre</label></h5>
                    <input type="text" name="nombre" class="form-control"><br>
                    <h5><label for="precio" class="form-label">Precio</label></h5>
                    <input type="number" name="precio" class="form-control"><br><br>
                    <h6><label for="visible" class="form-label">¿Quieres hacerlo visible?</label></h6>
                    <input type="radio" name="visible" value="1" checked class="form-check-input btn-outline-dark">Si
                    <input type="radio" name="visible" value="0" class="form-check-input">No
                    <br><br>
                    <h5><label for="descripcion" class="form-label">Descripcion</label></h5>
                    <textarea name="descripcion" rows="5" cols="30" placeholder="Lorem Ipsum" class="form-control"></textarea> 
                    <br>
                    <input type="file" name="imagen[]" multiple class="form-control"><br><br>
                    <input type="submit" value="Insertar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-12 mt-5" id="borrarProductos">
                <h2 class="m-2 text-center">Borrar Productos</h2>
                <form action="borrarProducto.php" class="text-center" method="post">
                <?php 
                    //Select para poder cargar todos los productos a borrar  
                    $borrar = $conn ->query("SELECT * FROM productos ORDER BY id DESC;");
                ?>
                    <select name="productoBorrar" id="productos" class="form-select">
                        <option value="X" selected disabled>Producto a Borrar</option>
                        <?php while ($borrado = $borrar->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){ ?>
                            <option value="<?php echo $borrado['id']?>"><?php echo $borrado['nombre']?></option>
                        <?php } ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Borrar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-12 mt-5" id="actualizarProductos">
                <h2 class="text-center">Actualizar Producto</h2>
                <table class="table table-hover text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>visible</th>
                        <th>Descripción</th>
                        <th>Enviar</th>
                    </tr>
                    <?php $mostrarDatos = $conn ->query("SELECT * FROM productos ORDER BY id DESC;");
                        while ($mostrarActualizar = $mostrarDatos->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){  
                    ?>  
                        <form method="post" action="actualizarProducto.php">
                            <tr>
                                <th><input class="form-control" type="text" name="nombreActualizar" value="<?php echo $mostrarActualizar['nombre'];?>"></th>
                                <th><input class="form-control" type="number" name="precioActualizar" value="<?php echo $mostrarActualizar['precio'];?>"></th>
                                <th>
                                <select name="visibleActualizar" class="form-select" required>
                                    <option value="1" disabled>¿Quieres hacerlo visible?</option>
                                    <option value="1" <?php if ($mostrarActualizar['activado'] == 1 ) { echo "selected";}  ?> >Si</option>
                                    <option value="0" <?php if ($mostrarActualizar['activado'] == 0 ) { echo "selected";} ?> >No</option>
                                </select>
                                </th>
                                <th><textarea class="form-control" name="descripcionActualizar" rows="3" cols="30"><?php echo $mostrarActualizar['descripcion'];?></textarea></th>
                                <th>
                                    <input type="hidden" name="idActualizar" value="<?php echo $mostrarActualizar['id'];?>">
                                    <input type="submit" value="Actualizar" class="btn btn-dark">
                                </th>
                            </tr> 
                        </form>
                    <?php } ?>
                </table>
            </div>
            <div class="col-12 mt-5" id="mostrarUsuarios">
                <h2 class="text-center">Administradores</h2>
                <?php
                    include '../php/connect.php';
                    $consulta = $conn->query("SELECT * FROM clientes where tipo = 'admin' or tipo = 'colaborador';");
                    ?>
                <table class='table table-hover text-center'>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Tipo</th>
                    </tr>
                <?php
                while ($clientes = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
                ?>
                    <tr>
                        <td><?php echo $clientes['nombre'];?></td>
                        <td><?php echo $clientes['usuario'];?></td>
                        <td><?php echo $clientes['email']?></td>
                        <td><?php echo $clientes['tipo'];?></td>
                    </tr>
                <?php
                }
                ?>
                </table>
            </div>
            <div class="col-12  mt-5" id="insertarUsuarios">
                <h2 class=" text-center">Añadir Usuarios</h2>
                <form method="post" action="insertarUsuario.php" name="submit">
                    <h5><label for="nombre" class="form-label">Nombre</label></h5>
                    <input type="text" name="nombre" class="form-control" required><br>
                    <h5><label for="usuario" class="form-label">Usuario</label></h5>
                    <input type="text" name="usuario" class="form-control" required><br>
                    <h5><label for="contrasena" class="form-label">Contraseña</label></h5>
                    <input type="password" name="contrasena" class="form-control" required><br>
                    <h5><label for="correo" class="form-label">Email</label></h5>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off"><br><br>
                    <h6><label for="visible" class="form-label">Tipo de Usuario</label></h6>
                    <input type="radio" name="tipo" value="admin" class="form-check-input btn-outline-dark">Admin
                    <input type="radio" name="tipo" value="colaborador" checked class="form-check-input">Colaborador
                    <br><br>
                    <input type="submit" value="Crear" class="btn btn-dark">
                </form>
            </div>
            <div class="col-12 mt-5" id="borrarUsuarios">
                <h2 class="m-2 text-center">Borrar Usuarios</h2>
                <form action="borrarUsuario.php" class="text-center" method="post">
                <?php 
                    //Select para poder cargar todos los Administradores a borrar  
                    $borrar = $conn ->query("SELECT id, usuario FROM clientes WHERE tipo like 'admin' or tipo like 'colaborador';");
                ?>
                    <select name="usuarioBorrar" class="form-select">
                        <option value="X" selected disabled>Usuario a Borrar</option>
                        <?php while ($borrado = $borrar->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){ ?>
                            <option value="<?php echo $borrado['id']?>"><?php echo $borrado['usuario']?></option>
                        <?php } ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Borrar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-12 mt-5" id="actualizarUsuarios">
                <h2 class="text-center">Actualizar Usuarios</h2>
                <table class="table table-hover text-center">
                    <tr>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Enviar</th>
                    </tr>
                    <?php $mostrarDatos = $conn ->query("SELECT * FROM clientes WHERE tipo like 'admin' or tipo like 'colaborador';");
                        while ($mostrarActualizar = $mostrarDatos->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){  
                    ?>  
                        <form method="post" action="actualizarUsuario.php">
                            <tr>
                                <th><input class="form-control" type="text" name="usuarioActualizar" value="<?php echo $mostrarActualizar['usuario'];?>"></th>
                                <th><input class="form-control" type="password" name="contrasenaUsuario" value="<?php echo $mostrarActualizar['contrasena'];?>"></th>
                                <th><input class="form-control" type="text" name="emailUsuario" value="<?php echo $mostrarActualizar['email'];?>"></th>
                                <th>
                                    <select name="tipoUsuarioActualizar" class="form-select" required>
                                        <option value="X" disabled>¿Quieres cambiar el tipo de usuario?</option>
                                        <option value="admin" <?php if ($mostrarActualizar['tipo'] == 'admin' ) { echo "selected";}  ?> >Admin</option>
                                        <option value="colaborador" <?php if ($mostrarActualizar['tipo'] == 'colaborador' ) { echo "selected";} ?> >Colaborador</option>
                                    </select>
                            </th>
                                <th>
                                    <input type="hidden" name="idUsuario" value="<?php echo $mostrarActualizar['id'];?>">
                                    <input type="submit" value="Actualizar" class="btn btn-dark">
                                </th>
                            </tr> 
                        </form>
                    <?php } ?>
                </table>
            </div>
        </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<script src="../js/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php include '../php/close.php'; ?>
</body>
</html>
