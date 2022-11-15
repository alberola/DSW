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
    <h1>Tables Alejandro Alberola</h1>
    <div>
        <?php
        $columns = $_POST['columns'];
        $rows = $_POST['rows'];
        $number = $_POST['num'];
        $increment = $_POST['increment'];

        if (empty($columns) || empty($rows) || empty($number) || empty($increment)) {
            echo "Please check the numbers introduced";
        } else {
            echo "<table border='0'>";
            for ($i=0; $i < $columns; $i++) { 
                echo "<tr>";
                for ($j=0; $j < $rows; $j++) { 
                    echo "<td>",$number,"</td>";
                    $number += $increment;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <br><br>
        <button><a href="index.html">Back</a></button>
    </div>
</body>
</html>
