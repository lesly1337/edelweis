<?php

$dbname;
$login;
$pass;
$conn;

require "db/db_connection.php";
require "db/db_functions.php";

$site_info    = get_site_info($conn);
$navigation   = get_navigation($conn);

$uri;
$uri_array;

require "core/uri_handler.php";

$uri_section_name = $uri === "" ? "main" : $uri_array[0];
$section_id   = get_section_id($conn, $uri_section_name);
$section_name = get_section_name($conn, $section_id);

if ($uri_section_name === "admin") {

    require "web/admin/index.php";

} else {
    $file_name;
    $section_has_articles;
    $articles;
    $error_type;
    $category_id;
    $article_data;
    
    require "core/render_page.php";
}

exit();
