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
            $language = $_POST['language'];
            $day = $_POST['day'];
            $dictionary = array(
                array("Monday" => "Lunes", "Tuesday" => "Martes", "Wednesday" => "Miercoles", "Thursday" => "Jueves", "Friday" => "Viernes", "Saturday" => "Sabado", "Sunday" => "Domingo"),
                array("Monday" => "Lundi", "Tuesday" => "Mardi", "Wednesday" => "Mercredi", "Thursday" => "Jeudi", "Friday" => "Vendredi", "Saturday" => "Samedi", "Sunday" => "Dimanche"),
                array("Monday" => "lunedì", "Tuesday" => "martedì", "Wednesday" => "mercoledì", "Thursday" => "giovedì", "Friday" => "venerdì", "Saturday" => "sabato", "Sunday" => "domenica")
            );
            
            if ( !isset($day) || !isset($language)){
                echo "You have to select both options.";
            } else {
                switch ($language) {
                    case '0':
                        echo "<p>The day " . $day . " in Spanish is " . $dictionary[$language][$day] . ".</p>";
                        break;
                    case '1':
                        echo "<p>The day " . $day . " in French is " . $dictionary[$language][$day] . ".</p>";
                        break;
                    case '2':
                        echo "<p>The day " . $day . " in Italian is " . $dictionary[$language][$day] . ".</p>";
                        break;
                }
            }
        ?>
        <br><br>
    <a href="index.html">Return</a>
    </div>
</body>
</html>