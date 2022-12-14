<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["dates"])){
        $_SESSION["dates"] = array(
            array('admin','1234','admin'),
            array('alejandro','1234','admin'),
            array('ale','qwerty','usuario')
        );
    }

    if (isset($_POST['submit'])){
        function clean($data){
            $data = trim($data);
            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }

        function correctlogin(){
            if (isset($_POST['user']) && isset($_POST['password']) ){        
                $user = clean($_POST['user']);
                $password = clean($_POST['password']);
                $cont = 0;
                for ( $i = 0 ; $i < count($_SESSION["dates"]) ; $i++){
                    if ($user == $_SESSION["dates"][$i][0] && $password == $_SESSION["dates"][$i][1]){
                        echo "<h3>Welcome ". $user . " you are " . $_SESSION["dates"][$i][2]."</h3>";
                        $cont++;
                        break;
                    } 
                } if ($cont != 1) {
                    echo "<h3> You are not register please do it first. </h3>";
                }
            }
        }
        correctlogin();
    }
    ?> 
    <button class="back"><a href="http://localhost/DSW/">Back</a></button>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h1>Alejandro Alberola Log in</h1>
        <input type="text" placeholder="alejandro" name="user">
        <input type="password" placeholder="1234" name="password">
        <input type="submit" value="Log in" class="submit" name="submit">
        <p class="link"><a href="register.php">Don't have an account yet?</a></p>
    </form>
</body>
</html>