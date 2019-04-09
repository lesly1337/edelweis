
<?php


function create_info_article($conn, $title, $category_id, $intro, $text, $picture) {
    $sth = $conn->prepare("INSERT INTO `article` (`id`, `name`, `category_id`, `intro`, `text`, `picture`) VALUES (NULL, :title, :category_id, :intro, :text, :picture)");
    $sth->execute(array(
        ":title"       => $title,
        ":category_id" => $category_id,
        ":intro"       => $intro,
        ":text"        => $text,
        ":picture"     => $picture 
    ));
}

if (
    isset($_POST["title"]) && $_POST["title"] !== "" &&
    isset($_POST["intro"]) && $_POST["intro"] !== "" &&
    isset($_POST["text"]) && $_POST["text"] !== "" &&
    isset($_POST["category_id"]) && $_POST["category_id"] !== ""
) {
    create_info_article($conn, $_POST["title"], $_POST["category_id"], $_POST["intro"], $_POST["text"], "rooms_1.jpg");
}




function get_info_articles($conn) {
    $sth = $conn->prepare("SELECT `name`, `category_id` FROM `article` ORDER BY `id`");
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

function get_info_categories($conn) {
    $sth = $conn->prepare("SELECT `id`, `name` FROM `category` WHERE `has_articles` = 1");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$articles = get_info_articles($conn);
$categories = get_info_categories($conn);

var_dump($articles);
var_dump($_POST);
var_dump($categories);

?>

<table>
<?php
    for ( $i = 0; $i < count($articles); $i++ ) {
        $id = $articles[$i]["category_id"];
        $category_name = get_info_category_name($conn, $id);

        echo "<tr>";
        echo "<td>" . $category_name . "</td>";
        echo "<td>" . $articles[$i]["name"] . "</td>";
        echo "</tr>";
    }
?>
</table>

<form method="post">

    <div>
        <select name="category_id">
        <?php
            for ( $i = 0; $i < count($categories); $i++ ) {
                echo "<option value=\"" . $categories[$i]["id"] . "\">" . $categories[$i]["name"] . "</option>";
            }
        ?>
        </select>
    </div>
    <div>
        <input name="title" type="text">
    </div>
    <div>
        <textarea name="intro" cols="30" rows="5"></textarea>
    </div>
    <div>
        <textarea name="text" cols="30" rows="15"></textarea>
    </div>
    <div>
        <button type="submit">Создать</button>
    </div>
</form>
