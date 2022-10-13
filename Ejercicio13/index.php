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
    <?php
        function limpiar($data){
                $data = trim($data);
                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
        }
        function reporteErrores($data, $tipo){
            if (!isset($data)){ 
                return "";
            } else if (empty(limpiar($data))){
                echo "<span style = color:red> No ha introducido el ". $tipo ."</span>";
            }
        }
    ?>
    <button><a href="http://localhost/DSW/">Back</a></button>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" name="submit">
    <h1>Formulario</h1>
    <fieldset>
        <legend>Datos Personales</legend>
        <div>
            <br>
            Nombre: *<input type="text" name="nombre" autocomplete="off"> <?php echo reporteErrores($_POST['nombre'],"nombre"); ?> <br><br>
            Apellidos: *<input type="text" name="apellidos" size="30" autcomplete="off"><br><br>
            Edad: 
            <select name="" id="">
                <option value="" selected disabled>...</option>
                <option value="menor">M</option>

            </select>
            <br><br>
            Peso: <input type="text" name="peso" autocomplete="off" size="3"> kg <br><br>
            Telefono: *<input type="text" name="telefono" size="12" autocomplete="off"> <br><br>
            Página Web: <input type="text" name="pagina" autocomplete="off"> <br> <br>
            Indique su direccion de correo: *<input type="text" size="30" autocomplete="off"> <br><br>
            Confirme su direccion de correo: *<input type="text" size="30" autocomplete="off"> <br><br>
            Indique si quiere recibir correos nuestros: 
            <select name="spam" id="">
                <option value="" selected disabled>...</option>
                <option value="si">Si</option>
                <option value="no">No</option>
            </select><br><br>
            <fieldset>
                <legend>Otros Datos</legend>
                <h4>Aficiones</h4><input type="checkbox" name="aficiones" id="">Cine 
                <input type="checkbox" name="aficiones" value="literatura">Literatura
                <input type="checkbox" name="aficiones" value="tebeos">Tebeos
                <input type="checkbox" name="aficiones" value="deporte">Deporte
                <input type="checkbox" name="aficiones" value="musica">Musica
                <input type="checkbox" name="aficiones" value="television">Televisión
                <h4>Indique su fruta preferida:</h4>
                <input type="radio" name="fruta"> Cerezas <br>
                <input type="radio" name="fruta"> Fresas <br>
                <input type="radio" name="fruta"> Limón <br>
                <input type="radio" name="fruta"> Manzana <br>
                <input type="radio" name="fruta"> Naranja <br>
                <input type="radio" name="fruta"> Pera
                <h4>Cambia estilo de la página:</h4>
                <input type="radio" name="fondo"> Color del fondo de la página <br>
                <input type="radio" name="letra"> Color de la letra de la página <br> <br>
                <textarea name="comentarios" rows="10" cols="40" placeholder="Escribe aquí tus comentarios"></textarea>
            </fieldset>
            <br><br>
            <input type="submit" value="Enviar" name="submit">
            <input type="reset" value="Borrar">
        </div>
    </fieldset>
    </form>
    
</body>
</html>