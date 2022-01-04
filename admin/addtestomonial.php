<?php
include_once("../session.php");
require_once "../model/testomonial.php";

$pageName = "Add Testomonial";
$testomonial = new Testomonial();
$isEdit = false;

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['params'])) {
    $testomonialData = $testomonial->read($_GET["id"])[0];
    if ($_GET['params'] === "edit") {
        $isEdit = true;
    }
}

function uploadImage($fileObj)
{
    $fileType = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedTypes = array("jpg", "png", "jpeg");
    $uploadDir = "../media/img/testomonial/";

    if (in_array($fileType, $exceptedTypes)) {
        $fileName = uniqid("", true) . "." . $fileType;
        $fileDestination = $uploadDir . $fileName;
        move_uploaded_file($fileObj["tmp_name"], $fileDestination);
        return $fileName;
    } else {
        throw new Exception("Unexpected file type");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $review = $_POST['review'];
    $status = 1;
    $message = htmlspecialchars($_POST['message']);
    $fileObj = $_FILES["image"];

    if ($isEdit) {
        if ($fileObj["size"] != 0) {
            $fileName = uploadImage($fileObj);
            $updatedData = array("Name" => $name, "message" => $message, "designation" => $designation, "review" => $review, "status" => $status, "media" => $fileName);
        } else {
            $updatedData = array("Name" => $name, "message" => $message, "designation" => $designation, "review" => $review, "status" => $status);
        }
        $testomonial->update($updatedData, $_GET["id"]);
        header("Refresh:0");
        die();
    }
    $fileName = uploadImage($fileObj);
    $data = array("Name" => $name, "message" => $message, "designation" => $designation, "review" => $review, "status" => $status, "media" => $fileName);
    $testomonial->create($data);
    header("Location:./testomonial.php");
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
                                    <form method="POST" enctype="multipart/form-data">
                                        <h3 class="text-center">General Details</h3>
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="sitename">Name</label>
                                                <input type="type" class="form-control" id="sitename" placeholder="Name"
                                                    value="<?php if ($isEdit) {
                                                                                                                                    echo $testomonialData["Name"];
                                                                                                                                } ?>"
                                                    name="name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="contactinput">designation</label>
                                                <input value="<?php if ($isEdit) {
                                                                    echo $testomonialData["designation"];
                                                                } ?>" type="text" class="form-control"
                                                    id="contactinput" placeholder="designation" name="designation">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputemail">review</label>
                                                <input value="<?php if ($isEdit) {
                                                                    echo $testomonialData["review"];
                                                                } ?>" type="number" class="form-control"
                                                    id="inputemail" placeholder="review" name="review">
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control" name="message" id="message"
                                                    rows="3"><?php if ($isEdit) {
                                                                                                                        echo $testomonialData["message"];
                                                                                                                    } ?></textarea>
                                            </div>
                                            <!-- <div class="form-group col-md-6">
                                                <label for="mailerinout">status</label>
                                                <input type="number" class="form-control" id="mailerinout"
                                                    placeholder="status" name="status">
                                            </div> -->
                                            <?php if ($isEdit) : ?>
                                            <img src="../media/img/testomonial/<?php echo $testomonialData["media"] ?>"
                                                alt="media">
                                            <?php endif; ?>
                                            <div class="custom-file mt-3">
                                                <input type="file" class="custom-file-input" id="inputllogo02"
                                                    name="image">
                                                <label class="custom-file-label" for="inputllogo02">Image</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-cta" name="submit_general">Save
                                            changes</button>
                                    </form>
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