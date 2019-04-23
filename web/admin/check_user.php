<?php

// function get_password($conn, $login) {
//     $sth = $conn->prepare("SELECT `password` FROM `user` WHERE `login` = :login");
//     $sth->execute(array(":login" => $login));
//     $result = $sth->fetch(PDO::FETCH_ASSOC);
//     return $result ? $result['password'] : false;
// }

// $is_authorized = false;
// $is_incorrect = false;

// if (isset($_POST["login"]) && isset($_POST["password"])) {
//     $pass = get_password($conn, $_POST["login"]);

//     if ( $pass ===  $_POST["password"]) {
//         $is_authorized = true;
//     } else {
//         $is_incorrect = true;
//     }
// }

$is_authorized = true;
$is_incorrect = false;