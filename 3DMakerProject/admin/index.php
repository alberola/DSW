<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <h1 class="display-6 text-center">Panel de Control</h1>
<?php

    include '../php/connect.php';
    $consulta = $conn->query("SELECT * FROM productos;");
        echo "<table class='table table-hover text-center'>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
            ";
        while ($productos = $consulta->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){
            echo "<tr>
                    <td>".$productos['nombre']."</td>
                    <td>".$productos['descripcion']."</td>.
                    <td>".$productos['precio']."</td>
                 </tr>";
        }
        echo "</table>";

?>
    <br><br>
    <h2 class="m-2 text-center">Insertar Datos</h2>
    <form method="post" action="insertarProducto.php" name="submit" class="m-2 text-center" enctype="multipart/form-data">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label for="precio">Precio</label>
        <input type="number" name="precio"><br><br>
        <select name="visible" id="visible" required>
            <option value="0" selected disabled>Visible</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select><br><br>
        <label for="descripcion" class="text-center">Descripción</label> <br><br>
        <textarea name="descripcion" rows="5" cols="30" placeholder="Lorem Ipsum"></textarea> 
        <br><br>
        <input type="file" name="imagen" id="imagen"><br><br>
        <input type="submit" value="Insertar">
    </form>

    <br><br>
    <h2 class="m-2 text-center">Borrar Datos</h2>
    <form action="borrarProducto.php" class="m-2 text-center" method="post">
    <?php 
        //Select para poder cargar todos los productos a borrar  
        $borrar = $conn ->query("SELECT * FROM productos;");
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
    <h2 class="m-2 text-center">Actualizar Datos</h2>
    <form method="post" action="actualizarProducto.php" class="m-2 text-center" enctype="multipart/form-data">
        <select name="productoActualizar" id="productosActualizar">
            <option value="X" selected disabled>Producto a Actualizar</option>
            <?php 
                $actualizar = $conn ->query("SELECT * FROM productos;"); 
                while ($actualizado = $actualizar->fetch(PDO::FETCH_BOTH /*FETCH_OBJ*/)){     
            ?>
                <option value="<?php echo $actualizado['id']?>"><?php echo $actualizado['nombre']?></option>
            <?php } ?>
        </select>
        <br><br>
        <div id="mostrarDatosActualizar" style="display:none;">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"><br><br>
            <label for="precio">Precio</label>
            <input type="number" name="precio"><br><br>
            <select name="visible" id="visible" required>
                <option value="0" selected disabled>Visible</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select><br><br>
            <label for="descripcion" class="text-center">Descripción</label> <br><br>
            <textarea name="descripcion" rows="5" cols="30" placeholder="Lorem Ipsum"></textarea> 
            <br><br>
            <input type="file" name="imagen" id="imagen"><br><br>
            <input type="submit" value="Actualizar">
        </div>
    </form>
    <a href="../index.php" class="text-center m-2">Volver</a>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php include '../php/close.php'; ?>