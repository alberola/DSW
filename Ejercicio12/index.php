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
    <h1>Alejandro Alberola Login</h1>
    <div> 
        <?php

            function clean($data){
                $data = trim($data);
                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashesip($data);
                return $data;
            }

            $_SESSION[$dates] = array(
                array('admin','1234','admin'),
                array('alejandro','1234','admin'),
                array('ale','qwerty','usuario')
            );
            if (isset($_POST['user']) && isset($_POST['password']) ){        
            $user = clean($_POST['user']);
            $password = clean($_POST['password']);
            for ( $i = 0 ; i < count($dates) ; $i++){
                if ($user = $dates[$i][0] && $password != $dates[$i][1]){

                } else {
                    echo "";
                }
            }
            
            }

        ?>     
        <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post">
            <input type="text" name="user" placeholder="alejandro" autocomplete="off"><br><br>
            <input type="password" placeholder="1234" name="password"><br><br>
            <input type="submit" value="Sign in">
            <input type="submit" value="Register">
            <input type="reset" value="Reset">

            <br><br>
            <button><a href="http://localhost/DSW/">Back</a></button>
        </form>
    </div>
</body>
</html>