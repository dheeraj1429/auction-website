<?php
require_once "../model/blog.php";
require_once "../model/category.php";

session_start();

$pageName = "Add/Edit Blog";


function getCategory()
{
    $category = new Category();
    $sql = "SELECT name, id FROM bnmi_category WHERE status = '2'";
    $categories = $category->runCustomQuery($sql);
    return $categories;
}

function uploadImage($fileObj)
{
    $fileType = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedTypes = array("jpg", "png", "jpeg");
    $uploadDir = "./media/img/blog/";

    if (in_array($fileType, $exceptedTypes)) {
        $fileName = uniqid("", true) . "." . $fileType;
        $fileDestination = $uploadDir . $fileName;
        move_uploaded_file($fileObj["tmp_name"], $fileDestination);
        return $fileDestination;
    } else {
        throw new Exception("Unexpected file type");
    }
}

$categories = getCategory();

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $url = $_POST['url'];
    $cat = $_POST['cat'];
    $descShort = $_POST['short'];
    $desc = htmlspecialchars($_POST['desc']);
    $mTitle = $_POST['mtitle'];
    $mDesc = $_POST['mdesc'];
    $mKeyword = $_POST['mkeyword'];
    $image = $_FILES['image'];
    $blog = new Blog();

    $filePath = uploadImage($image);

    $data = array(
        "name" => $name,
        "url" => $url,
        "cat" => $cat,
        "desc" => $desc,
        "post_date" => date("Y-m-d"),
        "meta_keyword" => $mKeyword,
        "meta_title" => $mTitle,
        "meta_desc" => $mDesc,
        "status" => 1,
        "img" => $filePath,
        "short_desc" => $descShort
    );
    $blog->create($data);
    // if (mysqli_query($conn, $query) == true) {
    //     $tmpName = $_FILES['image']['tmp_name'];
    //     if (file_exists($tmpName)) {
    //         $fileName = $_FILES['image']['name'];
    //         $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    //         if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
    //             $fileName = rand(1111, 9999) . "." . $ext;
    //             if (move_uploaded_file($tmpName, '../media/img/blog/' . $fileName) == true) {
    //                 mysqli_query($conn, "UPDATE `" . $tblPrefix . "blog` SET `img`='$fileName' WHERE `id`='$id'");
    //                 $_SESSION['toast']['type'] = "success";
    //                 $_SESSION['toast']['msg'] = "Successfully updated.";
    //             } else {
    //                 $_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
    //             }
    //         } else {
    //             $_SESSION['toast']['msg'] = "Upload only image format(jpg,jpeg,png).";
    //         }
    //     }
    // } else {
    //     $_SESSION['toast']['type'] = "error";
    //     $_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
    // }
}

// // Update data 
// if(isset($_GET['id'])){
//     $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
//     $data=mysqli_query($conn,"SELECT * FROM `".$tblPrefix."blog` WHERE id='$id'");
//     $dataB=mysqli_fetch_assoc($data);
// }
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
                                    <h3 class="card-title text-center"><?php echo $pageName; ?></h3>
                                    <div class="col-lg-12 mb-3">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <label for="head">Blog Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Heading"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                    echo $dataB['name'];
                                                                                                                                } ?>"
                                                    name="name" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Blog Url</label>
                                                <input type="text" class="form-control" id="url" placeholder="Blog url"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                    echo $dataB['url'];
                                                                                                                                } ?>"
                                                    name="url" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Blog Category</label>
                                                <select class="form-control" name="cat" autocomplete="off" required="">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                    <option value="" selected="" disabled="">
                                                        <?php echo $category["name"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="inputllogo02"
                                                        name="image">
                                                    <label class="custom-file-label" for="inputllogo02">Image</label>
                                                </div>
                                                <?php if (isset($_GET['id'])) { ?>
                                                <img src="../media/img/blog/<?php if (isset($_GET['id'])) {
                                                                                    echo $dataB['img'];
                                                                                } ?>"
                                                    class="img-circle img-responsive m-auto mx-2"
                                                    alt="<?php if (isset($_GET['id'])) {
                                                                                                                                                echo $dataB['name'];
                                                                                                                                            } ?>" height="100px;">
                                                <?php } ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="text">Blog Short Content</label>
                                                <textarea class="form-control" name="short"><?php if (isset($_GET['id'])) {
                                                                                                echo htmlspecialchars_decode($dataB['short_desc']);
                                                                                            } ?></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="text">Blog Content</label>
                                                <textarea class="form-control" name="desc" id="editor"><?php if (isset($_GET['id'])) {
                                                                                                            echo htmlspecialchars_decode($dataB['desc']);
                                                                                                        } ?></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="mtitle">Blog Meta Title</label>
                                                <input type="text" class="form-control" id="mtitle"
                                                    placeholder="Heading"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                        echo $dataB['meta_title'];
                                                                                                                                    } ?>"
                                                    name="mtitle" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="keyword">Blog Meta Keyword</label>
                                                <input type="text" class="form-control" id="keyword"
                                                    placeholder="Heading"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                        echo $dataB['meta_keyword'];
                                                                                                                                    } ?>"
                                                    name="mkeyword" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="mdesc">Blog Meta Description</label>
                                                <input type="text" class="form-control" id="mdesc" placeholder="Heading"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                    echo $dataB['meta_desc'];
                                                                                                                                } ?>"
                                                    name="mdesc" autocomplete="off" required="">
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