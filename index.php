<?php


// $uri = $_SERVER["REQUEST_URI"];
if (array_key_exists("path", $_GET)) {
    $uri = $_GET["path"];
} else {
    $uri = "";
}

echo "Uri: " . $uri . "</br>";

$uriArray = explode("/", $uri);

$l = count($uriArray) - 1;

if ($uriArray[$l] === "") {
    unset($uriArray[$l]);
}

var_dump($uriArray);

$list_of_sections = array(
    "main",
    "town",
    "entertainment",
    "hotel",
    "contacts"
);

if ( empty($uriArray) ) {
    require "template/main.php";
}

if ( count($uriArray) === 1 ) { 

    if (array_search($uriArray[0], $list_of_sections)) {
        if ( $uriArray[0] === "main" ) {
            require "template/main.php";
        } else {
            require "template/section.php";
        }
    }
}

if ( count($uriArray) === 2 ) { 
    require "template/article.php";
}

if ( count($uriArray) > 2 ) { 
    require "template/error.php";
}
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
