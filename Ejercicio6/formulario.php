<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div>
    <?php
        $numero = $_POST['numero'];
        if($numero == 0){
            echo "<h3>No se puede calcular la tabla de multiplicar del 0</h3>";
        } else {
            echo "<h3>Tabla de multiplicar del " . $numero."</h3>";   
            for ($i = 1; $i <= 10; $i++) {
                echo $numero ." x ". $i ." = " . $numero*$i."<br>";
            }
        }
    ?>
    <br><br>
    <button><a href="index.html">Volver</a></button>
    </div>
</body>
</html>