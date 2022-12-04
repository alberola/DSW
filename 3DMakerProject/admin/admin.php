<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <h1 class="display-6 text-center">Panel de Control</h1>
<div class="container">
<?php
    session_start();
    if (!isset($_SESSION['tipo'])) {
        header("location: ../index.php");
    } 
    echo ($_SESSION['tipo']);
    include '../php/connect.php';
    $consulta = $conn->query("SELECT * FROM productos;");
        echo "<table class='table table-hover text-center'>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Visible</th>
                <th>Precio</th>
            </tr>
            ";
        while ($productos = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
            echo "<tr>
                    <td>".$productos['nombre']."</td>
                    <td>".$productos['descripcion']."</td>
                    <td>".(($productos['activado'] == 1)?'Si':'No')."</td>
                    <td>".$productos['precio']."</td>
                 </tr>";
        }
        echo "</table>";
?>
    <br><br>
    <h2 class="m-2 text-center">Insertar Producto</h2>
    <form method="post" action="insertarProducto.php" name="submit" class="m-2 text-center" enctype="multipart/form-data">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label for="precio">Precio</label>
        <input type="number" name="precio"><br><br>
        <p>¿Quieres hacerlo visible?</p>
        <input type="radio" name="visible" value="1" checked>Si
        <input type="radio" name="visible" value="0">No
        <br><br>
        <label for="descripcion" class="text-center">Descripción</label> <br><br>
        <textarea name="descripcion" rows="5" cols="30" placeholder="Lorem Ipsum"></textarea> 
        <br><br>
        <input type="file" name="imagen[]" multiple><br><br>
        <input type="submit" value="Insertar">
    </form>

    <br><br>
    <h2 class="m-2 text-center">Borrar Producto</h2>
    <form action="borrarProducto.php" class="m-2 text-center" method="post">
    <?php 
        //Select para poder cargar todos los productos a borrar  
        $borrar = $conn ->query("SELECT * FROM productos ORDER BY id DESC;");
    ?>
        <select name="productoBorrar" id="productos">
            <option value="X" selected disabled>Producto a Borrar</option>
            <?php while ($borrado = $borrar->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){ ?>
                <option value="<?php echo $borrado['id']?>"><?php echo $borrado['nombre']?></option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" value="Borrar">
    </form>

    <br><br>
    <h2 class="m-2 text-center">Actualizar Producto</h2>
        <div id="mostrarDatosActualizar">
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
                                <th><input type="text" name="nombreActualizar" value="<?php echo $mostrarActualizar['nombre'];?>"></th>
                                <th><input type="number" name="precioActualizar" value="<?php echo $mostrarActualizar['precio'];?>"></th>
                                <th>
                                <select name="visibleActualizar" id="visible" required>
                                    <option value="1" disabled>¿Quieres hacerlo visible?</option>
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                </select>
                                </th>
                                <th><textarea name="descripcionActualizar" rows="3" cols="30"><?php echo $mostrarActualizar['descripcion'];?></textarea></th>
                                <th>
                                    <input type="hidden" name="idActualizar" value="<?php echo $mostrarActualizar['id'];?>">
                                    <input type="submit" value="Actualizar" class="btn btn-dark">
                                </th>
                            </tr> 
                        </form>
                    <?php } ?>
                </table>
        </div>
    <div class="text-center"> <a href="cerrarSesion.php" class="text-center m-4 btn btn-dark">Cerrar Sesión</a> </div>
    <div class="text-center"> <a href="../index.php" class="text-center m-4 btn btn-dark">Volver</a> </div>
</div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php include '../php/close.php'; ?>