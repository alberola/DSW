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
        error_reporting(0);
        //Funcion para limpiar los datos que entran por pantalla.
        function limpiar($data){
                $data = trim($data);
                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
        }
        //Funcion que reportara false si no ha entrado un dato o true (limpiando el dato que nos entra).
        function reporteErrores($data, $tipo){
            if (!isset($data)){ 
                return false;
            } else if (empty(limpiar($data))){
                return true;
            }
        }
        //Funcion para comprobar que la direccion de correo que nos entra no son iguales.
        function confirmacionCorreo($corre,$correo2){
            if(!isset($corre) && !isset($correo2)){
                return false;
            } else if ($corre != $correo2){
                return true;
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
            Nombre: *<input type="text" name="nombre" autocomplete="off">
            <!--En esta zona insertamos una comprobacion del método reporteErorres e imprimiremos si no ha introducido el campo o no-->
            <?php echo (reporteErrores($_POST['nombre'],"nombre"))? '<span style = color:red> No ha introducido el nombre.</span>': ''; ?> 
            <br><br>
            Apellidos: *<input type="text" name="apellidos" size="30" autcomplete="off">
            <!--En esta zona insertamos una comprobacion del método reporteErorres e imprimiremos si no ha introducido el campo o no-->
            <?php echo (reporteErrores($_POST['apellidos'],"apellidos"))? '<span style = color:red> No ha introducido los apellidos.</span>': ''; ?> 
            <br><br>
            Edad: 
            <select name="edad">
                <option value="" selected disabled>...</option>
                <option value="10">10 años</option>
                <option value="20">20 años</option>
                <option value="30">30 años</option>
                <option value="40">40 años</option>
                <option value="x">No sabe / No contesta</option>
            </select>
            <br><br>
            Peso: <input type="text" name="peso" autocomplete="off" size="3"> kg <br><br>
            Telefono: *<input type="text" name="telefono" size="12" autocomplete="off">
            <?php echo (reporteErrores($_POST['telefono'],"telefono"))? '<span style = color:red> No ha introducido el teléfono.</span>': ''; ?> 
            <br><br>
            Página Web: <input type="text" name="pagina" autocomplete="off"> <br> <br>
            Indique su direccion de correo: *<input type="text" size="30" name="correo"> <br>
            <?php echo (confirmacionCorreo($_POST['correo'],$_POST['correo2'])) ? '<span style = color:red> Los correos no coinciden.</span>': ''; ?> 
            <br>
            Confirme su direccion de correo: *<input type="text" size="30" autocomplete="off" name="correo2"> <br><br>
            Indique si quiere recibir correos nuestros: 
            <select name="spam">
                <option value="" selected disabled>...</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select><br><br>
            <fieldset>
                <legend>Otros Datos</legend>
                <h4>Aficiones</h4>
                <input type="checkbox" name="aficiones[]" value="Cine">Cine 
                <input type="checkbox" name="aficiones[]" value="Literatura">Literatura
                <input type="checkbox" name="aficiones[]" value="Tebeos">Tebeos
                <input type="checkbox" name="aficiones[]" value="Deporte">Deporte
                <input type="checkbox" name="aficiones[]" value="Musica">Musica
                <input type="checkbox" name="aficiones[]" value="Televeisión">Televisión
                <h4>Indique su fruta preferida:</h4>
                <input type="radio" name="fruta" value="cerezas.svg"> Cerezas <br>
                <input type="radio" name="fruta" value="fresa.svg"> Fresas <br>
                <input type="radio" name="fruta" value="limon.svg"> Limón <br>
                <input type="radio" name="fruta" value="manzana.svg"> Manzana <br>
                <input type="radio" name="fruta" value="naranja.svg"> Naranja <br>
                <input type="radio" name="fruta" value="pera.svg"> Pera
                <h4>Cambia estilo de la página:</h4>
                <input type="radio" name="fondo" value="1"> Color del fondo de la página <br>
                <input type="radio" name="letra" value="1"> Color de la letra de la página <br> <br>
                <textarea name="comentarios" rows="10" cols="40" placeholder="Escribe aquí tus comentarios"></textarea>
            </fieldset>
            <img src="" alt="" >
            <br><br>
            <input type="submit" value="Enviar" name="submit">
            <input type="reset" value="Borrar">
        </div>
    </fieldset>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Funcion que comprobara los datos e imprimirá en función, no pondrá nada o escribirá los datos.
        function imprimirDatos(){
            //Condicional ternaria que dirá el nombre si el reporte de errores es false o en su defecto dejara string vacio.
            $nombre = (!reporteErrores($_POST['nombre'], 'nombre')) ? 'Tu nombre es : ' . $_POST['nombre'].'.<br>' : ''; 
            //De igual forma hacemos con los apellidos y con el resto de datos.
            $apellidos = (!reporteErrores($_POST['apellidos'], 'apellidos')) ? 'Tus apellidos son : ' . $_POST['apellidos'].'.<br>' : ''; 
            //En el caso de la edad como no requiere una comprobación obligatoria comprobamos si nos viene vacio o no.
            $edad = (!empty($_POST['edad'])) ? 'Tu edad es '.$_POST['edad'] . ' años.<br>' : '';
            $peso = (!empty($_POST['peso'])) ? 'Tu peso es '.$_POST['peso'] . ' Kg.<br>' : '';
            $telefono = (!reporteErrores($_POST['telefono'], 'telefeno')) ? 'Tu teléfono es : ' . $_POST['telefono'].'.<br>' : ''; 
            $pagina = (!empty($_POST['pagina'])) ? 'Tu página es '.$_POST['pagina'] . '<br>' : '';
            $correo = (!confirmacionCorreo($_POST['correo'],$_POST['correo2'])) ? 'Tu correo es : '.$_POST['correo'] . '<br>': '';
            $spam = ($_POST['spam'] == 1)? 'Desea recibir spam.<br>' : 'No desea recibir spam.<br>';
            //$aficiones = (!empty($_POST['aficiones'])) ?  'Tus aficiones son ' . foreach($_POST['aficiones'] as $aficion) {$aficion}. ' , ' . '<br>' : '';
            //Condicional ternario para las frutas jugando con la variable value y metiendo el formato que se desea.
            $frutas = (!empty($_POST['fruta'])) ? '<img src="'. $_POST['fruta'] . '" width=100px height =100px><br>': '';
            $fondo = (!empty($_POST['fondo'])) ? '<style> *{ background-color: bisque; }</style>' : '';
            $letra = (!empty($_POST['letra'])) ? '<style> *{ color: saddlebrown; }</style>' : '';
            $texto = (!empty($_POST['comentarios'])) ? 'Su comentario es: ' . $_POST['comentarios'] .'.': '';
                return $nombre.$apellidos.$edad.$telefono.$pagina.$correo.$spam.$aficiones.$frutas.$fondo.$letra.$texto;
        }

        echo imprimirDatos();
    }
    ?>
</body>
</html>