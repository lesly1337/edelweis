<?php

$file_name = "error";

if ($uri === "" || count($uri_array) === 1) {

    if ($section_id) {

        $section_has_articles = has_articles($conn, $section_id);

        if ($section_has_articles) {
            $articles = get_articles($conn, $section_id);
            $file_name = "section";
        } else {
            $file_name = $uri === "" ? "main" : $uri_array[0];
        }

    } else {
        $error_type = "Section \"" . $uri_array[0] . "\" isn`t exist!";
    }

} elseif (count($uri_array) === 2) {
    
    if ($section_id) {

        $category_id = get_category_id( $conn, $uri_array[1] );

        if ( $section_id === $category_id ) {
            $article_data = get_article_data( $conn, $uri_array[1] );
            $file_name = "article";
        } else {
            $error_type = "Article isn`t exist!";
        }
        
    } else {
        $error_type = "Section isn`t exist!";
    }

} else {
    $error_type = "Page isn`t exist!";
}

require "web/" . $file_name . ".php";
