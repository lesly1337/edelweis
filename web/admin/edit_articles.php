<?php if (isset($_GET["page"]) && ($_GET["page"] === "create" || $_GET["page"] === "edit")): ?>
<a href="http://edelweis.test/admin/?page=list">Список статей</a>
<?php else: ?>
<a href="http://edelweis.test/admin/?page=create"><i class="fas fa-plus"></i> Создать статью</a>
<?php endif; ?>

<?php 

if ( isset($_GET["page"]) && ($_GET["page"] === "create" || ($_GET["page"] === "edit" && isset($_GET["id"]) )) ) {

    require "articles/" . $_GET["page"] . ".php";

} else {
    require "articles/list.php";
}
