<?php
require_once "../session.php";
require_once "../model/cmsPages.php";
$pageName = "How It Works";

if (!isset($_SESSION["admin_email"])) {
    header("Location: ./login.php");
    die();
}

$cmsPages = new CmsPages();

if (isset($_GET["delete-row"])) {
    $cmsPages->delete($_GET["delete-row"]);
    header("Location: ./how-it-work.php");
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedData = array("status" => $_POST["status"]);
    $cmsPages->update($updatedData, $_POST["id"]);
}
$data = $cmsPages->getCMSByType(3);
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
                                <div class="card-body row justify-content-center">
                                    <?php foreach ($data as $datahit) : ?>
                                    <div class="col-lg-5 my-2">
                                        <div class="card m-b-30">
                                            <div class="card-media col-12 text-center">
                                                <img class="card-img-top img-responsive img-fluid"
                                                    src="../media/img/cms/<?php echo $datahit['img'] ?>" alt="">
                                            </div>
                                            <div class="card-header">
                                                <h5 class="card-title m-b-0"><?php echo $datahit['title']; ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $datahit['desc']; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="add-how-it-work.php?id=<?php echo $datahit['id'] ?>"
                                                    class="edit-this btn btn-primary">Edit</a>

                                                <a href="#" class="btn btn-danger delete-row"
                                                    data-this-id="<?php echo $datahit['id'] ?>">Delete</a>

                                                <span class="ml-5">
                                                    <label class="cstm-switch">
                                                        <input type="checkbox"
                                                            data-this-id="<?php echo $datahit['id']; ?>" name="option"
                                                            class="cstm-switch-input change-status"
                                                            <?php if ($datahit['status'] == 2) {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        } ?>>
                                                        <span class="cstm-switch-indicator"></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <a href="add-how-it-work.php" class="btn-floating btn btn-primary" id="Add Section" data-toggle="tooltip"
        data-placement="top" title="" data-original-title="Add">
        <i class="mdi mdi-plus"></i>
    </a>

    <?php include_once('inc/js.php'); ?>
    <?php include_once('inc/search-bar.php'); ?>

</body>

</html>