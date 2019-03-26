<?php
var_dump($_POST);

$login = "Vasya";
$password = "qwerty";

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>
     
    <h1><?=$section_name?></h1>

    <form method="post">
        login: <input type="text" name="login"><br>
        password: <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <p>Логин: <?=$_POST["login"]?></p>

    <?php

    if ( $_POST["login"] === $login ) {
        if ( $_POST["password"] === $password ) {
            echo "Login successful";
        } else {
            echo "Wrong password";       
        }
    } else {
        echo "Wrong login";
    }

    ?>
 </body>
 </html>