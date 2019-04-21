<?php 

if ( isset($_GET["page"]) && isset($_GET["id"]) && $_GET["page"] === "delete" ) {
    require "delete.php";
}

function get_info_articles($conn) {
    $sth = $conn->prepare("SELECT `id`, `name`, `category_id` FROM `article` ORDER BY `id`");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_info_category_name($conn, $id) {
    $sth = $conn->prepare("SELECT `name` FROM `category` WHERE `id` = :id");
    $sth->execute(array(":id" => $id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['name'] : false;
}

$articles = get_info_articles($conn);

?>

<table>
<?php
    for ( $i = 0; $i < count($articles); $i++ ) {
        $id = $articles[$i]["category_id"];
        $category_name = get_info_category_name($conn, $id);

        // $delete_link = "http://edelweis.test/admin/?page=edit&id=" . $articles[$i]["id"];

        echo "<tr>";
        echo "<td><div onclick=\"deleteArticle(" . $articles[$i]["id"] . ")\"><i class=\"fas fa-trash-alt\" title=\"Удалить\"></i></div></td>";
        echo "<td><a href=\"http://edelweis.test/admin/?page=edit&id=" . $articles[$i]["id"] . "\"><i class=\"fas fa-edit\" title=\"Редактировать\"></i></a></td>";
        echo "<td>" . $category_name . "</td>";
        echo "<td><a href=\"http://edelweis.test/admin/?page=edit&id=" . $articles[$i]["id"] . "\">" . $articles[$i]["name"] . "</a></td>";
        echo "</tr>";
    }
?>
</table>
