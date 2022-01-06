<?php
include_once("../session.php");
require_once "../model/cmsPages.php";
$pageName = "CMS Pages";
$cmsPages = new CMSPages();

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['params'])) {
    if (isset($_GET["params"]) == "delete") {
        $cmsPages->delete($_GET["id"]);
        header("Location: ./cmsPages.php");
    }
}

$data = $cmsPages->read();
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
                                    <div style="display: flex; justify-content: space-between">
                                        <h4>CMSPages</h4>
                                        <a href="./addCMS.php" type="button" class="btn btn-primary">
                                            Add
                                        </a>
                                    </div>
                                    <div class="table-responsive p-t-10">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Type</th>
                                                <th>img</th>
                                                <th>description</th>
                                                <th>date time</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($data); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $data[$i]["type"] ?></td>
                                                    <td><?php echo $data[$i]["img"] ?></td>
                                                    <td><?php echo $data[$i]["desc"] ?></td>
                                                    <td><?php echo $data[$i]["date_time"] ?></td>
                                                    <td style="display: flex;">
                                                        <a href="./addCMS.php?id=<?php echo $data[$i]["id"] ?>&params=edit"
                                                            type="button" class="btn btn-primary edit-btn">Edit</a>
                                                        <a href="./cmsPages.php?id=<?php echo $data[$i]["id"] ?>&params=delete"
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