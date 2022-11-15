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
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operador = $_POST['operacion'];
        switch($operador){
            case "suma":
                echo "El resultado de la suma es : ". $numero1+ $numero2; 
            break;
            case "resta":
                echo "El resultado de la resta es : ". $numero1 - $numero2;
            break;
            case "multiplicacion":
                echo "El resultado de la multiplicacion es : ". $numero1 * $numero2;
            break;
            case "division":
                if ($numero2 == 0) {
                    echo "No se puede dividir un número entre 0.";
                } else {
                echo "El resultado de la division es : ". $numero1 / $numero2;
                }
            break;
            case "resto":
                echo "El resultado del resto es : ". $numero1 % $numero2;
            break;
            default:
            echo "No ha seleccionado ninguna operación.";
        }
        ?>
        <br> <br>
        <button><a href="index.html">Volver</a></button>
    </div>
</body>
</html>