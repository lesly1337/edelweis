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

$domain_name = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . "/";

$html = "";

for ( $i = 0;  $i < count($navigation); $i++ ) {
    $html .=  "<a href=\"" . $domain_name . $navigation[$i]["path"] . "\"";
    if (isset($uri_array) && $uri_array[0] === $navigation[$i]["path"]) {
        $html .= " class=\"active\"";
        $section_title = $navigation[$i]["name"];
    } elseif (!isset($uri_array) && $navigation[$i]["path"] === "main") {
        $html .= " class=\"active\"";
    }
    $html .=  ">" . $navigation[$i]["name"] . "</a>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require "parts/head.php"; ?>
</head>
<body>

<?php require "parts/navigation.php"; ?>

<?php require "web/site/" . $file_name . ".php"; ?>

<?php require "parts/footer.php"; ?>
<?php require "parts/copyright.php"; ?>

<?php require "parts/js.php"; ?>

</body>
</html>