<?php

function get_section_id($conn, $section) {
    $sth = $conn->prepare("SELECT `id` FROM `category` WHERE `path` = :section");
    $sth->execute(array(":section" => $section));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['id'] : false;
}

function get_section_name($conn, $id) {
    $sth = $conn->prepare("SELECT `name` FROM `category` WHERE `id` = :id");
    $sth->execute(array(":id" => $id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['name'] : false;
}

function get_articles($conn, $id) {
    $sth = $conn->prepare("SELECT `id`, `name`, `intro`, `picture` FROM `article` WHERE `category_id` = :id");
    $sth->execute(array(":id" => $id));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_category_id( $conn, $article_id ) {
    $sth = $conn->prepare("SELECT `category_id` FROM `article` WHERE `id` = :article_id");
    $sth->execute(array(":article_id" => $article_id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['category_id'] : false;
}

function get_article_data( $conn, $article_id ) {
    $sth = $conn->prepare("SELECT * FROM `article` WHERE `id` = :article_id");
    $sth->execute(array(":article_id" => $article_id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_site_info($conn) {
    $sth = $conn->prepare("SELECT * FROM `setting`");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;    
}

function get_navigation($conn) {
    $sth = $conn->prepare("SELECT `name`, `path` FROM `category` WHERE `id` != 0");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function has_articles($conn, $section_id) {
    $sth = $conn->prepare("SELECT `has_articles` FROM `category` WHERE `id` = :section_id");
    $sth->execute(array(":section_id" => $section_id));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result["has_articles"];
}

function get_password($conn, $login) {
    $sth = $conn->prepare("SELECT `password` FROM `user` WHERE `login` = :login");
    $sth->execute(array(":login" => $login));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['password'] : false;
}
