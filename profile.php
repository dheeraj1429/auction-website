<?php
require_once "./session.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
}
?>

<?php require_once "./header.php" ?>
<h1>Hello <?php echo $_SESSION["username"] ?></h1>