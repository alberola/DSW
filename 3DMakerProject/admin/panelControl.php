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

        include '../php/close.php'; 
?>
    <br><br>
    <h2 class="m-2">Insertar Datos</h2>
    <form method="post" action="insertarProducto.php" name="submit" class="m-2" enctype="multipart/form-data">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label for="precio">Precio</label>
        <input type="number" name="precio"><br><br>
        <label for="peso">Peso</label>
        <input type="number" name="peso"><br><br>
        <label for="longitud">Longitud</label>
        <input type="number" name="longitud"><br><br>
        <label for="anchura">Anchura</label>
        <input type="number" name="anchura"><br><br>
        <label for="altura">Altura</label>
        <input type="number" name="altura"><br><br>
        <label for="existencias">Existencias</label>
        <input type="number" name="existencias"><br><br>
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
    <a href="../index.php" class="text-center m-2">Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>