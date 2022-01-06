<?php
require_once "./session.php";
require_once "./model/users.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
}

if (isset($_GET["token"])) {
    $users = new Users();
    $userData = $users->getUserByToken($_GET["token"]);
}
?>

<?php require_once "./header.php" ?>
<h1>Hello, <?php echo $userData["username"] ?></h1>
<p>Email: <?php echo $userData["email"] ?></p>
<p>Contact: <?php echo $userData["contact"] ?></p>
<p>Address: <?php echo $userData["address"] ?></p>