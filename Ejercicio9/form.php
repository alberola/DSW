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
        $num = $_POST['numero'];
        $array = array();
        for ($i=0; $i < $num; $i++) { 
            $array[$i] = $i*2;
            echo "In the position ". $i . " the value is ". $array[$i] ."<br>";
        }

    ?>
    <br><br>
    <a href="index.html">Back</a>
    </div>
</body>
</html>