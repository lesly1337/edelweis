<?php

function get_info_site_name($conn) {
    $sth = $conn->prepare("SELECT `site_name` FROM `setting` WHERE `id` = 1");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['site_name'] : false;
}
function get_info_slogan($conn) {
    $sth = $conn->prepare("SELECT `slogan` FROM `setting` WHERE `id` = 1");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['slogan'] : false;
}
function get_info_phone_1($conn) {
    $sth = $conn->prepare("SELECT `phone_1` FROM `setting` WHERE `id` = 1");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['phone_1'] : false;
}
function get_info_email_1($conn) {
    $sth = $conn->prepare("SELECT `email_1` FROM `setting` WHERE `id` = 1");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['email_1'] : false;
}

// ==========================================================

function update_info_site_name($conn, $site_name) {
    $sth = $conn->prepare("UPDATE `setting` SET `site_name` = :site_name WHERE `id` = 1;");
    $sth->execute(array(":site_name" => $site_name));
}

function update_info_slogan($conn, $slogan) {
    $sth = $conn->prepare("UPDATE `setting` SET `slogan` = :slogan WHERE `id` = 1;");
    $sth->execute(array(":slogan" => $slogan));
}

function update_info_phone_1($conn, $phone_1) {
    $sth = $conn->prepare("UPDATE `setting` SET `phone_1` = :phone_1 WHERE `id` = 1;");
    $sth->execute(array(":phone_1" => $phone_1));
}

function update_info_email_1($conn, $email_1) {
    $sth = $conn->prepare("UPDATE `setting` SET `email_1` = :email_1 WHERE `id` = 1;");
    $sth->execute(array(":email_1" => $email_1));
}

if (isset($_POST["info_site_name"]) && $_POST["info_site_name"] !== "") {
    $info_site_name = $_POST["info_site_name"];
    update_info_site_name($conn, $info_site_name);

}

if (isset($_POST["info_slogan"]) && $_POST["info_slogan"] !== "") {
    $info_slogan = $_POST["info_slogan"];
    update_info_slogan($conn, $info_slogan);

}

if (isset($_POST["info_phone_1"]) && $_POST["info_phone_1"] !== "") {
    $info_phone_1 = $_POST["info_phone_1"];
    update_info_phone_1($conn, $info_phone_1);

}

if (isset($_POST["info_email_1"]) && $_POST["info_email_1"] !== "") {
    $info_email_1 = $_POST["info_email_1"];
    update_info_email_1($conn, $info_email_1);

}

// ============================================================

$info_site_name = get_info_site_name($conn);

$info_slogan = get_info_slogan($conn);

$info_phone_1 = get_info_phone_1($conn);

$info_email_1 = get_info_email_1($conn);

?>

<form method="post">

    <div>
        Имя сайта: <input type="text" name="info_site_name"> <?php echo $info_site_name; ?>
    </div>

    <div>
        Слоган: <input type="text" name="info_slogan"> <?php echo $info_slogan; ?>
    </div>

    <div>
        Телефон: <input type="text" name="info_phone_1"> <?php echo $info_phone_1; ?>
    </div>

    <div>
        Email: <input type="text" name="info_email_1"> <?php echo $info_email_1; ?>
    </div>

    <input type="submit" value="send">


</form>