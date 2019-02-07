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
    $sth = $conn->prepare("SELECT `id`, `name`, `intro`, `picture` FROM `article` WHERE `category_id` = :id");
    $sth->execute( array(':id' => $id) );
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_category_id( $conn, $article_id ) {
    $sth = $conn->prepare("SELECT `category_id` FROM `article` WHERE `id` = :article_id");
    $sth->execute( array(':article_id' => $article_id) );
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['category_id'] : false;
}

function get_article_data( $conn, $article_id ) {
    $sth = $conn->prepare("SELECT * FROM `article` WHERE `id` = :article_id");
    $sth->execute( array(':article_id' => $article_id) );
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_site_info($conn) {
    $sth = $conn->prepare("SELECT * FROM `setting`");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;    
}

function get_navigation($conn) {
    $sth = $conn->prepare("SELECT `name`, `path` FROM `category`");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$site_info    = get_site_info($conn);
$section_name = get_section_name($conn, 1);
$navigation   = get_navigation($conn);

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
            $articles     = get_articles($conn, $section_id);

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
    $section_id = get_section_id( $conn, $uri_array[0] );

    if ($section_id) {

        // Check if article exists in database
        $category_id = get_category_id( $conn, $uri_array[1] );

        if ( $section_id === $category_id ) {
            // this is article
            $article_data = get_article_data( $conn, $uri_array[1] );

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
