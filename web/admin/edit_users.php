<?php

var_dump($_POST);

function get_users($conn) {
    $sth = $conn->prepare("SELECT * FROM `user`");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$users = get_users($conn);
var_dump($users);

?>

<form method="post">

<table>
<?php
for ( $i = 0; $i < count($users); $i++ ) {
    echo "<tr>";
    echo "    <td>" . $users[$i]["login"] . "</td>";
    echo "    <td><input type=\"text\" name=\"user_login\"></td>";
    echo "    <td><input type=\"text\" name=\"user_id\" value=\"4\" style=\"display: none;\"></td>";
    echo "</tr>";
}
?>
</table>

<input type="submit" value="Изменить">

</form>

