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

        function clean($data){
            $data = trim($data);
            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashesip($data);
            return $data;
        }

        $_SESSION["$dates"] = array(
            array('admin','1234','admin'),
            array('alejandro','1234','admin'),
            array('ale','qwerty','usuario')
        );
        if (isset($_POST['user']) && isset($_POST['password']) ){        
            $user = clean($_POST['user']);
            $password = clean($_POST['password']);
            for ( $i = 0 ; i < count($dates) ; $i++){
                if ($user != $dates[$i][0] && $password != $dates[$i][1]){
                    echo "Incorrect log in please register first.";
                } else {
                    echo "";
                }
            }
        }

    ?> 
    <button class="back"><a href="http://localhost/DSW/">Back</a></button>
    <form action="">
        <h1>Alejandro Alberola Log in</h1>
        <input type="text" placeholder="alejandro" name="user">
        <input type="password" placeholder="1234" name="password">
        <button>Log in</button>
        <p class="link"><a href="register.php">Don't have an account yet?</a></p>
    </form>
</body>
</html>