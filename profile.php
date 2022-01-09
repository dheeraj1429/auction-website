<?php
require_once "./session.php";
require_once "./model/users.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
}

$users = new Users();
$userData = $users->read($_SESSION["email"])[0];
?>

<?php require_once "./header.php" ?>
<h1>Hello, <?php echo $userData["username"] ?></h1>
<p>Email: <?php echo $userData["email"] ?></p>
<p>Contact: <?php echo $userData["contact"] ?></p>
<p>Address: <?php echo $userData["address"] ?></p>