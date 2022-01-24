<?php
include_once("../session.php");
require_once("../model/cmsPages.php");
require_once "../model/cmsCategory.php";

$pageName = "Add CMS";
$isEdit = false;
$cmsPages = new CmsPages();
$cmsCategory = new CmsCategory();

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

function uploadImage($fileObj)
{
    $fileType = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedTypes = array("jpg", "png", "jpeg");
    $uploadDir = "../media/img/cms/";

    if (in_array($fileType, $exceptedTypes)) {
        $fileName = uniqid("", true) . "." . $fileType;
        $fileDestination = $uploadDir . $fileName;
        move_uploaded_file($fileObj["tmp_name"], $fileDestination);
        return $fileName;
    } else {
        throw new Exception("Unexpected file type");
    }
}

if (isset($_GET["id"]) && isset($_GET["params"])) {
    if ($_GET["params"] == "edit") {
        $isEdit = true;
        $dataB = $cmsPages->read($_GET["id"])[0];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    $title = $_POST["title"];
    $image = $_FILES["image"];
    $discription = htmlspecialchars($_POST["discription"]);

    if ($isEdit) {
        if ($image["size"] != 0) {
            $fileName = uploadImage($image);
            $data = array("type" => $type, "title" => $title, "img" => $fileName, "`desc`" => $discription);
        }
        $data = array("type" => $type, "title" => $title, "`desc`" => $discription);
        $cmsPages->update($data, $_GET["id"]);
        header("Location: ./cmsPages.php");
        die();
    }

    if ($image["size"] != 0) {
        $fileName = uploadImage($image);
        $data = array("type" => $type, "title" => $title, "img" => $fileName, "desc" => $discription);
    } else {
        $data = array("type" => $type, "title" => $title, "desc" => $discription);
    }
    $cmsPages->create($data);
}
$categories = $cmsCategory->read();
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
                                    <h3 class="card-title text-center"><?php echo $pageName; ?></h3>
                                    <div class="col-lg-12 mb-3">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <label for="head">Type</label>
                                                <select class="form-control" name="type" autocomplete="off" required="">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category["id"] ?>">
                                                        <?php echo $category["name"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Title</label>
                                                <input name="title" type="text" class="form-control" id="title"
                                                    placeholder="Title"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                                echo $dataB['title'];
                                                                                                                                            } ?>"
                                                    autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="inputllogo02"
                                                        name="image">
                                                    <label class="custom-file-label" for="inputllogo02">Image</label>
                                                </div>
                                                <?php if (isset($_GET['id'])) { ?>
                                                <img src="<?php if (isset($_GET['id'])) {
                                                                    echo "../media/img/cms/" . $dataB['img'];
                                                                } ?>" class="img-circle img-responsive m-auto mx-2"
                                                    alt="<?php if (isset($_GET['id'])) {
                                                                                                                                echo $dataB['title'];
                                                                                                                            } ?>"
                                                    height="100px;">
                                                <?php } ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="text">Discription</label>
                                                <textarea class="form-control" name="discription"><?php if (isset($_GET['id'])) {
                                                                                                        echo htmlspecialchars_decode($dataB['desc']);
                                                                                                    } ?></textarea>
                                            </div>
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
            </section>
        </section>
    </main>

</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>