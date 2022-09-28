<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $edad=$_POST['edad'];
        $correo=$_POST['correo'];
        $numero1=$_POST['number1'];
        $numero2=$_POST['number2'];
        $sueldo=$_POST['sueldo'];
        $ipc=$_POST['ipc'];
        echo "<h1>Mensaje de bienvenida.</h1>"."<div> Bienvenido " .$nombre. ".<br>Sus Apellidos son: ". $apellidos. ".<br>Su edad es: " .$edad. ".<br>
        Su correo es: " .$correo. ".<br>Y dentro de 5 años tendrá " .($edad+5). " años.<br>La suma de los números introducidos es: ".($numero1+$numero2)."
        <br>La resta de los números introducidos es: ".($numero1-$numero2). "<br>La multiplicación de los números introducidos es: ".($numero1*$numero2).
        "<br>La división de los números introducidos es: ".($numero1/$numero2).".<br>Su sueldo es: ".$sueldo."€.<br>Y su sueldo calculando el IPC es: ".($sueldo+($sueldo*$ipc/100))."€.";
            
    ?>
    <button><a href="index.html">Volver</a></button>
</body>
</html>