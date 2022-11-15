<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        error_reporting(0);
        $color=$_POST['color'];
        $colorPicker=$_POST['colorPicker'];
        if ($color != null){   
            echo "
                <style>
                    body{
                        background:$color;
                    }
                </style>";
        } else {
            echo "
                <style>
                    body{
                        background:$colorPicker;
                    }
                </style>";
        }
        $desarrollo = 'Desarrollo de aplicaciones Web';
        $modulo = 'Desarrollo entorno Servidor';
        function printOnScreen(){
            global $desarrollo, $modulo;
            echo "Soy estudiante de ".$desarrollo. " y estoy cursando el módulo de ".$modulo.".";
        }
        printOnScreen();
    ?> 
    <br>
    <button><a href="index.html">Volver</a></button>
</body>
</html>