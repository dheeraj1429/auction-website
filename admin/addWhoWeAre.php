<?php
require_once "../session.php";
require_once "../model/cmsPages.php";

if (!isset($_SESSION["admin_email"])) {
    header("Location: ./login.php");
    die();
}

$pageName = "Add Who We Are";

function uploadFile($fileObj)
{
    $filetype = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedtypes = array("jpg", "png", "jpeg");
    $uploaddir = "../media/img/cms/";

    if (in_array($filetype, $exceptedtypes)) {
        $filename = uniqid("", true) . "." . $filetype;
        $filedestination = $uploaddir . $filename;
        move_uploaded_file($fileObj["tmp_name"], $filedestination);
        return $filename;
    } else {
        throw new exception("unexpected file type");
    }
}

$cmsPages = new CmsPages();

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $content = $_POST["content"];
    $image = $_FILES["image"];

    if ($image['size'] !== 0) {
        $fileName = uploadFile($image);
    } else {
        if (!isset($_GET["id"])) {
            header("Location: ./add-how-it-work.php");
            echo ("Please enter a image");
            die();
        } else {
            $fileName = null;
        }
    }
    if ($fileName) {
        if (!isset($_GET["id"])) {
            $data = array(
                "type" => 4,
                "title" => $name,
                "img" => $fileName,
                "desc" => $content,
            );
        } else {
            $data = array(
                "type" => 4,
                "title" => $name,
                "img" => $fileName,
                "`desc`" => $content,
            );
        }
    } else {
        $data = array(
            "type" => 4,
            "title" => $name,
            "`desc`" => $content,
        );
    }

    if (isset($_GET['id'])) {
        $cmsPages->update($data, $_GET['id']);
        $_SESSION["toast"]["msg"] = "Successfully updated";
    } else {
        $cmsPages->create($data);
        $_SESSION["toast"]["msg"] = "Successfully created";
    }
    header("Location: ./whoWeAre.php");
    die();
}

if (isset($_GET["id"])) {
    $hitData = $cmsPages->read($id = $_GET["id"])[0];
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
                        <div class="mx-auto mt-2 col-lg-8">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="name"
                                                value="<?php if (isset($_GET['id'])) {
                                                                                                                            echo $hitData['title'];
                                                                                                                        } ?>" name="name" autocomplete="OFF" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="content">Content</label>
                                            <input type="text" class="form-control" id="content" placeholder="Content"
                                                value="<?php if (isset($_GET['id'])) {
                                                                                                                                    echo $hitData['desc'];
                                                                                                                                } ?>"
                                                name="content" autocomplete="OFF" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="custom-file mt-3">
                                                <input type="file" class="custom-file-input" id="inputllogo02"
                                                    name="image">
                                                <label class="custom-file-label" for="inputllogo02">Image</label>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success m-auto"
                                                    name="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <h3 class="card-title text-center">Media<h3>
                                            <div class="col-lg-12 mb-3 text-center">
                                                <img src="../media/img/cms/<?php if (isset($_GET['id'])) {
                                                                                echo $hitData['img'];
                                                                            } else {
                                                                                echo 'default.png';
                                                                            } ?>"
                                                    class="img-fluid img-responsive m-auto mx-2">
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