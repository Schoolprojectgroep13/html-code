<?php
require('../app/database.php');

$sqlemail = "SELECT * FROM tbl_members WHERE email LIKE '%n%'";
$emails = $database->query($sqlemail)->fetchAll(PDO::FETCH_ASSOC);

var_dump($emails);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP MYSQL</title>
</head>
<body>
<a href="index.php">Subscribe here</a>
<ul>
    <?php
    foreach($emails as $email)
    {
        echo '<li>' . $email["email"] . '</li>';
    }
    ?>
</ul>
</body>
</html>