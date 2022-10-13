<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Formulario de Registro</title>
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
    <form action="">
        <h1>Register Form</h1>
        <input type="text" placeholder="Insert your user" name="user">
        <input type="password" placeholder="Insert your password" name="password">
        <p class="terms">I agree with terms and conditions</p>
        <button>Registrarse</button>
        <p class="link"><a href="index.php">Do you already have an account?</a></p>
    </form>
</body>
</html>