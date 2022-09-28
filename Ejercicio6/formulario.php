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
        error_reporting(0);
        $numero = $_POST['numero'];
        $tablas = $_POST['tablas'];
        $valor = $_POST['enviar'];
        if($valor != null){
            if($numero == 0){
                echo "<h3>No se puede calcular la tabla de multiplicar del 0</h3>";
            } else if($numero == null){
                echo "<h3>Debe Introducir un número para multiplicar.</h3>";
            } else {
                echo "<h3>Tabla de multiplicar del " . $numero."</h3>";   
                for ($i = 1; $i <= 10; $i++) {
                    echo $numero ." x ". $i ." = " . $numero*$i."<br>";
                }
            }
        } else {
            for ($i=1; $i <=10 ; $i++) {
                echo "<h3>Tabla de multiplicar del " . $i."</h3>"; 
                for($j=1; $j <= 10; $j++){
                    echo $i ." x ". $j ." = " . $i*$j."<br>";
                }
            }
        }
    ?>
    <br><br>
    <button><a href="index.html">Volver</a></button>
    </div>
</body>
</html>