<?php

$uri = array_key_exists("path", $_GET) ? $_GET["path"] : "";

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