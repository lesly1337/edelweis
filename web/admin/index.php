<?php

require "check_user.php";

$domain_name = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . "/";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ssf3ov4rtco9lv0czolaq5ij2x6ijnol90dciu43n09yurcw"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$domain_name?>web/admin/style.css">
    <title>Hello, world!</title>
  </head>
  <body>
        
<h1><?=$section_name?></h1>

<?php if ($is_authorized): ?>

    <?php require "main.php"; ?>

<?php else: ?>

    <form method="post">
        login: <input type="text" name="login"><br>
        password: <input type="password" name="password"><br>
        <input type="submit">
    </form> 

    <?php if ($is_incorrect): ?>
        <p>"Something wrong with your credentials. Check your login and password."</p>
    <?php endif; ?>

<?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      function deleteArticle(id) {
        alert("Id of the article to delete: " + id);
      }
    </script>
  </body>
</html>