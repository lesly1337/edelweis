<?php

$articles_data = "";

for ( $i = 0; $i < count($articles); $i++ ) {

    $articles_data .= "<div class=\"item\">";
    
    $articles_data .= "    <h2 class=\"title\">";
    $articles_data .= "        <a href=\"" . $domain_name . $uri_array[0] . "/" . $articles[$i]["id"] . "\">" . $articles[$i]["name"] . "</a>";
    $articles_data .= "    </h2>";
    
    $articles_data .= "    <div class=\"image\">";
    $articles_data .= "        <img src=\"" . $domain_name . "web/pictures/" . $articles[$i]["picture"] . "\" alt=\"\">";
    $articles_data .= "    </div>";
    
    $articles_data .= "    <div class=\"text\">" . $articles[$i]["intro"] . "</div>";
    
    $articles_data .= "    <div class=\"read-more\">";
    $articles_data .= "        <a href=\"". $domain_name . $uri_array[0] . "/" . $articles[$i]["id"] . "\">Подробнее</a>";
    $articles_data .= "    </div>";
    
    $articles_data .= "</div>";

}

?>

<section id="blog">
    <div class="wrapper">

        <div class="blog-header">
            <h1><?=$section_title?></h1>
        </div>

        <div class="blog-content">
            <?=$articles_data?>
        </div>

    </div>
</section>