<?php

require "auth/pass.php";

$conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $login, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
