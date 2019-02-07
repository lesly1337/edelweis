<?php

$l = count($navigation) - 1;

$nav_data = "";

for ( $i = 0; $i <= $l; $i++ ) {

    $nav_data .= "<a href=\"http://edelweis.test/" . $navigation[$i]["path"] . "/\">" . $navigation[$i]["name"] . "</a>";

}

?>

<nav>
    <?=$nav_data?>
</nav>