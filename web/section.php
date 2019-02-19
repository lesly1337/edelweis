<?php

require "parts/header.php";

$l = count($articles) - 1;

$articles_data = "";

for ( $i = 0; $i <= $l; $i++ ) {

    $articles_data .= "<h3><a href=\"http://edelweis.test/" . $uri_array[0] . "/" . $articles[$i]["id"] . "\">" . $articles[$i]["name"] . "</a></h3>";
    $articles_data .= "<div class=\"intro\">" . $articles[$i]["intro"] . "</div>";

}

?>

<div class="intro"><?=$articles_data?></div>

<?php require "parts/footer.php"; ?>

