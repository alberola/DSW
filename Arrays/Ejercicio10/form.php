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
    <h1></h1>
    <div>
    <?php
        $vector = array("1"=>"90", "30"=>"7", "e"=>"99", "hola"=>"43");
        foreach($vector as $x => $x_value){
            echo "The element of index ". $x . " is ".$x_value."<br>";
        }
    ?>
    <br><br>
    <a href="index.html">Return</a>
    </div>
</body>
</html>