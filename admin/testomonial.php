<?php
include_once("../session.php");
require_once "../model/testomonial.php";
$pageName = "Testomonial";

$testomonial = new Testomonial();
$testomonialData = $testomonial->read();

if (isset($_GET["id"]) && $_GET["params"]) {
    if ($_GET["params"] === "delete") {
        $testomonial->delete($_GET["id"]);
        header("Location: ./testomonial.php");
    }
}

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>
    <title><?php echo $pageName . " | " . "Smart Auction" ?></title>
</head>

<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php'); ?>
    <main class="admin-main">
        <?php include_once('inc/nav.php'); ?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php"); ?>
            <section class="pull-up">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>designation</th>
                                                    <th>review</th>
                                                    <th>datetime</th>
                                                    <th>media</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($testomonialData); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $testomonialData[$i]["Name"] ?></td>
                                                    <td><?php echo $testomonialData[$i]["designation"] ?></td>
                                                    <td><?php echo $testomonialData[$i]["review"] ?></td>
                                                    <td><?php echo $testomonialData[$i]["datetime"] ?></td>
                                                    <td><?php echo $testomonialData[$i]["media"] ?></td>
                                                    <td style="display: flex;">
                                                        <a href="./addtestomonial.php?id=<?php echo $testomonialData[$i]["id"] ?>&params=edit"
                                                            type="button" class="btn btn-primary edit-btn">Edit</a>
                                                        <a href="./testomonial.php?id=<?php echo $testomonialData[$i]["id"] ?>&params=delete"
                                                            type="button" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>