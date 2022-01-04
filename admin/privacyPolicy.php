<?php
require_once "../model/general.php";
session_start();
$pageName = "Privacy Policy";

$general = new General();

if (isset($_POST["submit"])) {
    if (isset($_POST["policy"])) {
        $updatedData = array("key_value" => $_POST["policy"]);
        $general->update($updatedData, "privacy");
    } else if (isset($_POST["condition"])) {
        $updatedData = array("key_value" => $_POST["condition"]);
        $general->update($updatedData, "condition");
    }
    header("Refresh:0");
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
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                                href="#line-home" role="tab" aria-controls="home"
                                                aria-selected="true">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" id="profile-tab2" data-toggle="tab"
                                                href="#line-profile" role="tab" aria-controls="profile"
                                                aria-selected="false">Team & Conditions</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <form method="post">
                                                <textarea class="form-control" name="policy" id="editor">
                                                <?php if (isset($_GET['id'])) {
                                                    echo htmlspecialchars_decode($dataB['desc']);
                                                } ?>
                                                </textarea>
                                                <div class="form-row pt-3">
                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-success m-auto"
                                                            name="submit">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="line-profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <form method="POST">
                                                <textarea class="form-control" name="condition" id="editor2">
                                                <?php if (isset($_GET['id'])) {
                                                    echo htmlspecialchars_decode($dataB['desc']);
                                                } ?>
                                                </textarea>
                                                <div class="form-row pt-3">
                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-success m-auto"
                                                            name="submit">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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