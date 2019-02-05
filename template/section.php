<?php 

$l = count($articles) - 1;

$articles_data = "";

for ( $i = 0; $i <= $l; $i++ ) {

    $articles_data .= "<h3>" . $articles[$i]["name"] . "</h3>";
    $articles_data .= "<div class=\"intro\">" . $articles[$i]["intro"] . "</div>";

}

?>

<h1><?=$section_name?></h1>

<div class="intro"><?=$articles_data?></div>

<?php exit(); ?>