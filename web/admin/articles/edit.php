<?php 

function get_articles_edit($conn, $id) {
    $sth = $conn->prepare("SELECT `name`, `category_id`, `intro`, `text` FROM `article` WHERE `id` = :id");
    $sth->execute(array(":id" => $id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function edit_info_article($conn, $id, $name, $category_id, $intro, $text) {
    $sth = $conn->prepare("UPDATE `article` SET `name`= :name, `category_id`= :category_id, `intro`= :intro, `text`= :text  WHERE `id` = :id");
    $sth->execute(array(
        ":id"          => $id,
        ":name"        => $name,
        ":category_id" => $category_id,
        ":intro"       => $intro,
        ":text"        => $text
    ));
}

function get_info_categories_edit($conn) {
    $sth = $conn->prepare("SELECT `id`, `name` FROM `category` WHERE `has_articles` = 1");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$categories = get_info_categories_edit($conn);

if ( isset($_GET["id"]) && $_GET["id"] !== "") {
    $id_edit = $_GET["id"];

    if (
        isset($_POST["title"]) && $_POST["title"] !== "" &&
        isset($_POST["intro"]) && $_POST["intro"] !== "" &&
        isset($_POST["text"]) && $_POST["text"] !== "" &&
        isset($_POST["category_id"]) && $_POST["category_id"] !== ""
    ) {
        edit_info_article($conn, $id_edit, $_POST["title"], $_POST["category_id"], $_POST["intro"], $_POST["text"]);
    }
    
    $article_edit = get_articles_edit($conn, $id_edit);
}

?>

<form method="post">

    <div>
        <select name="category_id">
        <?php
            for ( $i = 0; $i < count($categories); $i++ ) {
                if ( $article_edit["category_id"] === $categories[$i]["id"]) {
                    $selected = " selected";
                } else {
                    $selected = "";
                }
                echo "<option value=\"" . $categories[$i]["id"] . "\"" . $selected . ">" . $categories[$i]["name"] . "</option>";
            }
        ?>
        </select>
    </div>
    <div>
        <input name="title" type="text" value="<?php echo $article_edit["name"]; ?>">
    </div>
    <div>
        <textarea name="intro" cols="30" rows="5"><?php echo $article_edit["intro"]; ?></textarea>
    </div>
    <div>
        <textarea name="text" cols="30" rows="15"><?php echo $article_edit["text"]; ?></textarea>
    </div>
    <div>
        <button type="submit">Редактировать</button>
    </div>
</form>
