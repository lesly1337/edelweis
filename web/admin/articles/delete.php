<?php  

function delete_info_article($conn, $id) {
    $sth = $conn->prepare("DELETE FROM `article` WHERE `id` = :id");
    $sth->execute(array(":id" => $id));
}

delete_info_article($conn, $_GET["id"]);
