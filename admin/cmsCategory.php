<?php
require_once "../session.php";
require_once "../model/cmsCategory.php";

$pageName = "CMS Category";
$cmsCategory = new CMSCategory();

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_GET["id"]) && isset($_GET["params"])) {
    if ($_GET["params"] == "delete") {
        $cmsCategory->delete($_GET["id"]);
    }
    header("Location: ./cmsCategory.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["submit"])) {
    $updatedData = array("status" => $_POST["status"]);
    $cmsCategory->update($updatedData, $_POST["id"]);
    $_SESSION["toast"]["msg"] = "Updated Successfully";
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = 2;
    $data = array("name" => $name, "status" => $status);
    $cmsCategory->create($data);
    $_SESSION["toast"]["msg"] = "Added Successfully";
    header("Refresh: 0");
    die();
}
$data = $cmsCategory->read();
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
                                    <div class="center" style="display: flex; justify-content: space-between">
                                        <h2>CMS Category</h2>
                                        <button type="button" data-toggle="modal" data-target="#addCategory"
                                            class="btn btn-primary" style="text-align: center">Add</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($data); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $data[$i]["name"] ?></td>
                                                    <td><?php echo $data[$i]["date"] ?></td>
                                                    <td>
                                                        <span class="ml-5">
                                                            <label class="cstm-switch">
                                                                <input type="checkbox"
                                                                    data-this-id="<?php echo $data[$i]['id']; ?>"
                                                                    <?php if ($data[$i]['status'] == 2) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?> name="option"
                                                                    class="cstm-switch-input change-status">
                                                                <span class="cstm-switch-indicator"></span>
                                                            </label>
                                                        </span>
                                                    </td>
                                                    <td id="<?php echo $data[$i]["id"] ?>"
                                                        class="<?php echo $data[$i]["name"] ?>">
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#updateCategory" style="text-align: center"
                                                            class="btn btn-primary edit-btn">Edit</button>
                                                        <a href="./cmsCategory.php?id=<?php echo $data[$i]["id"] ?>&params=delete"
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
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="category-model" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="input-group input-group mb-3">
                            <input placeholder="Category name" type="text" class="form-control" name="name"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateCategory" tabindex="-1" aria-labelledby="update-category-model"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="./updateCMSCategory.php">
                    <div class="modal-body">
                        <div class="input-group input-group mb-3">
                            <input type="hidden" name="id" id="id-input">
                            <input id="edit-form" placeholder="Category name" type="text" class="form-control"
                                name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    const editButtons = document.getElementsByClassName("edit-btn");

    for (let button of editButtons) {
        button.onclick = () => {
            const parentNode = button.parentElement;
            const idInput = document.getElementById("id-input");
            const editForm = document.getElementById("edit-form");
            const nodeId = parentNode.id;
            const nodeValue = parentNode.className;
            idInput.value = nodeId;
            editForm.value = nodeValue;
        }
    }
    </script>
    <?php include_once('inc/js.php'); ?>
    <?php include_once('inc/search-bar.php'); ?>
</body>

</html>