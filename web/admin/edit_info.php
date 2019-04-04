<?php

// ==========================================================

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

function get_info_categories($conn) {
    $sth = $conn->prepare("SELECT `id`, `name` FROM `category` ORDER BY `id`");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
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

// ==========================================================

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

$info_site_name  = get_info_site_name($conn);

$info_slogan     = get_info_slogan($conn);

$info_phone_1    = get_info_phone_1($conn);

$info_email_1    = get_info_email_1($conn);

$info_categories = get_info_categories($conn);

// ==========================================================

?>

<form method="post" id="edit-info">

    <table>
<?php

    for ($i = 1; $i < count($info_categories); $i++) {

        echo "<tr>";
        echo "<td><input type=\"text\" name=\"" . $info_categories[$i]["id"] . "\"></td>";
        echo "<td>" . $info_categories[$i]["name"] . "</td>";
        echo "</tr>";

    }

?>
    </table>

    <table>
        <tr>
            <th>Имя сайта:</th>
            <td><input type="text" name="info_site_name"></td>
            <td><?php echo $info_site_name; ?></td>
        </tr>
        <tr>
            <th>Слоган:</th>
            <td><input type="text" name="info_slogan"></td>
            <td><?php echo $info_slogan; ?></td>
        </tr>
        <tr>
            <th>Телефон:</th>
            <td><input type="text" name="info_phone_1"></td>
            <td><?php echo $info_phone_1; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><input type="text" name="info_email_1"></td>
            <td><?php echo $info_email_1; ?></td>
        </tr>
        <tr>
            <th></th>
            <td></td>
            <td class="right"><input type="submit" value="send"></td>
        </tr>
    </table>

</form>