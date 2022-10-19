<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="http://localhost/DSW/">Back</a></button>
    <span class="fecha">
    <?php
        date_default_timezone_set("Europe/Madrid");
        setlocale(LC_TIME, 'spanish');
        echo strftime("%A, %d de %B de %Y");
    ?>
    </span>
</body>
</html>