<?php

// ============================================================================

// 1. Preparing
// 1.1. Get URI
// 1.2. Connecting to DataBase

// 2. Hangling URI (string -> variable)
// 2.1. Break URI into array
// 2.2. Delete last element if empty

// 3. Analasing URI
// 3.1. Define page
// 3.2. Get page id

// 4. Get Data

// 5. Rendering template

// ============================================================================

// 1. Preparing ===============================================================

// 1.1. Get URI

$uri = array_key_exists("path", $_GET) ? $_GET["path"] :  "";

// 1.2. Connecting to DataBase

require "auth/pass.php";
$conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $login, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2. Hangling URI (string -> variable) =======================================

function uri_to_array($uri_string) {
    return explode("/", $uri_string);
}

function strip_uri_array($arr) {
    $l = count($arr) - 1;
    
    if ($arr[$l] === "") {
        unset($arr[$l]);
    }

    return $arr;
}

if ( $uri !== "" ) {
    // 2.1. Break URI into array
    $uri_array = uri_to_array($uri);

    // 2.2. Delete last element if empty
    $uri_array = strip_uri_array($uri_array);
}


// 3. Analasing URI ===========================================================
// 3.1. Define page

function get_section_id($conn, $section) {
    $sth = $conn->prepare("SELECT `id` FROM `category` WHERE `path` = :section");
    $sth->execute( array(':section' => $section) );
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['id'] : false;
}

function get_section_name($conn, $id) {
    $sth = $conn->prepare("SELECT `name` FROM `category` WHERE `id` = :id");
    $sth->execute( array(':id' => $id) );
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['name'] : false;
}

function get_articles($conn, $id) {
    $sth = $conn->prepare("SELECT `name`, `intro`, `picture` FROM `article` WHERE `category_id` = :id");
    $sth->execute( array(':id' => $id) );
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

if ($uri === "") {

    // this is main page
    require "template/main.php";

} elseif (count($uri_array) === 1) {

    // this is main or section

    // Check if it is main page
    if ($uri_array[0] === "main") {
        // this is main
        require "template/main.php";
    } else {

        // Check if section exists in database
        $section_id = get_section_id($conn, $uri_array[0]);

        if ($section_id) {
            // this is section
            $section_name = get_section_name($conn, $section_id);
            $articles = get_articles($conn, $section_id);
            require "template/section.php";
        } else {
            // this is error
            $error_type = "Section \"" . $uri_array[0] . "\" isn`t exist!";
            require "template/error.php";
        }

    }

} elseif (count($uri_array) === 2) {

    // this is article in the section
        
    // Check if section exists in database
    $section_id = get_section_id($conn, $uri_array[0]);

    if ($section_id) {

        // Check if article exists in database
        $sth = $conn->prepare("SELECT `id` FROM `article` WHERE `id` = :id");
        $sth->execute( array(':id' => $uri_array[1]) );
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $article_exists = $result ? $result['id'] : false;

        if ( $article_exists ) {
            // this is article
            require "template/article.php";
        } else {
            // this is error
            $error_type = "Article isn`t exist!";
            require "template/error.php";
        }
        
    } else {
        // this is error
        $error_type = "Section isn`t exist!";
        require "template/error.php";
    }

} else {

    // this is error
    $error_type = "Page isn`t exist!";
    require "template/error.php";

}

// 3.2. Get page id

// 4. Get Data ================================================================

// 5. Rendering template ======================================================



?>

<p><a href="http://edelweis.test/town/kerch/center">http://edelweis.test/town/kerch/center</a></p>
<p><a href="http://edelweis.test/town/kerch/">http://edelweis.test/town/kerch/</a></p>
<p><a href="http://edelweis.test/town/kerch">http://edelweis.test/town/kerch</a></p>
<p><a href="http://edelweis.test/town/">http://edelweis.test/town/</a></p>
<p><a href="http://edelweis.test/town">http://edelweis.test/town</a></p>
<p><a href="http://edelweis.test/">http://edelweis.test/</a></p>
<p><a href="http://edelweis.test">http://edelweis.test</a></p>


<p><a href="http://edelweis.test/town">http://edelweis.test/town</a></p>
<p><a href="http://edelweis.test/entertainment">http://edelweis.test/entertainment</a></p>
<p><a href="http://edelweis.test/about">http://edelweis.test/about</a></p>
<p><a href="http://edelweis.test/contacts">http://edelweis.test/contacts</a></p>

<?php


$sth = $conn->prepare("SELECT * FROM `setting`");

$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

var_dump($result);

$site_name = $result["site_name"];

$slogan = $result["slogan"];




?>

<h1><?php echo $site_name; ?></h1>
<h2><?php echo $slogan; ?></h2>

