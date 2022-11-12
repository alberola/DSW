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
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h1>Register Form</h1>
        <input type="text" placeholder="Insert your user" name="user">
        <input type="password" placeholder="Insert your password" name="password">
        <p class="terms">I agree with terms and conditions</p>
        <button>Register</button>
        <p class="link"><a href="index.php">Do you already have an account?</a></p>
        <p> <?php  register() ?></p>
    </form>
    <?php
    if(isset($_POST['submit'])) {
        error_reporting(0);

        function clean($data){
            $data = trim($data);
            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashesip($data);
            return $data;
        }
        session_start();
        $users = $_SESSION['dates'];
        
        $cont = true;
        function register(){
            if (isset($_POST['user']) && isset($_POST['password']) ){        
                $user = clean($_POST['user']);
                $password = clean($_POST['password']);
                for ( $i = 0 ; i < count($users) ; $i++){
                    if ($user == $users[$i][0] && $password == $users[$i][1]){
                        echo "<h3>There are an user with the same user and password please log in.</h3>";
                        $cont = false;
                        break;
                    }
                }
                if (!$cont) {
                    echo "<h3>Register succesfull.</h3>";
                    $newArray = array($user, $password, "usuario");
                    array_push($users, $newArray);
                    session_destroy();
                }
            }
        }
    }
    ?>
</body>
</html>