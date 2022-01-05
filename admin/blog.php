<?php
require_once "../model/blog.php";
require_once "../session.php";
$pageName = "Manage Blog";
$blog = new Blog();

function getBlogs()
{
    $blog = new Blog();
    $blogs = $blog->getActiveBlog();
    return $blogs;
}


if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}
// change status...
// if (isset($_POST['id']) && $_POST['status']) {
//     $id = mysqli_real_escape_string($conn, ak_secure_string($_POST['id']));
//     $status = mysqli_real_escape_string($conn, ak_secure_string($_POST['status']));
//     mysqli_query($conn, "UPDATE `" . $tblPrefix . "blog` SET `status` = '$status' WHERE `id`=$id");
//     exit();
// }
// Delete
if (isset($_GET['params']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $params = $_GET['params'];
    if ($params === "delete") {
        $blog->delete($id);
    }
    // $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
    // $dataQ = mysqli_query($conn, "UPDATE `" . $tblPrefix . "blog` SET `status` = 0 WHERE `id`=$id");
    // if ($dataQ == true) {
    //     $_SESSION['toast']['msg'] = "Succesfully Deleted";
    //     header("location:alternative.php");
    //     exit();
    // } else {
    //     $_SESSION['toast']['msg'] = "Something Went Wrong";
    // }
}
$blogs = getBlogs();
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
                        <div class="col-lg-12 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <?php foreach ($blogs as $dataB) : ?>
                                    <div class="col-lg-4 m-b-30" style="float: left">
                                        <div class="card m-b-30">
                                            <div class="card-media">
                                                <img class="card-img-top"
                                                    src="../media/img/blog/<?php echo $dataB['img']; ?>"
                                                    alt="<?php echo $dataB['name']; ?>">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $dataB['name']; ?></h5>
                                                <p class="card-text">
                                                    <?php echo htmlspecialchars_decode($dataB['short_desc']); ?>
                                                </p>

                                                <a href="add-blog.php?id=<?php echo $dataB['id']; ?>"
                                                    class="btn btn-primary">Edit</a>

                                                <a href="./blog.php?id=<?php echo $dataB['id'] ?>&params=delete"
                                                    class="btn btn-danger delete-row"
                                                    data-this-id="<?php echo $dataB['id']; ?>">Delete</a>
                                                <span class="ml-5">
                                                    <label class="cstm-switch">
                                                        <input type="checkbox"
                                                            data-this-id="<?php echo $dataB['id']; ?>"
                                                            <?php if ($dataB['status'] == 2) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> name="option"
                                                            class="cstm-switch-input change-status">
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
    <a href="add-blog.php" class="btn-floating btn btn-primary" id="Add Section" data-toggle="tooltip"
        data-placement="top" title="" data-original-title="Add">
        <i class="mdi mdi-plus"></i>
    </a>
</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>