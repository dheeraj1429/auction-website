<?php
require_once "../session.php";
require_once "../model/auctionCategory.php";

if (!isset($_SESSION["admin_email"])) {
    header("Location: ./login.php");
    die();
}
$pageName = "Auction Category";
$auctionCategory = new AuctionCategory();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $auctionCategory->delete($id);
    header("Location: ./auctionCategory.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["status"])) {
        $status = $_POST["status"];
        $id = $_POST["id"];
        $auctionCategory->update(array("status" => $status), $id);
        echo json_encode(array("status" => "Done"));
        die();
    }
    $name = $_POST["auction-category"];
    $status = 2;
    $data = array("name" => $name, "status" => $status);
    $auctionCategory->create($data);
    header("Refresh: 0");
    die();
}
$categoryData = $auctionCategory->read();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>

    <title><?php echo "Smart Auction | " . $pageName ?></title>
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
                                    <div class="center"
                                        style="display: flex; width: 100%; align-items: center; justify-content: space-between">

                                        <h2>Auction Categories</h2>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Add
                                        </button>
                                    </div>
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($categoryData); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $categoryData[$i]["name"] ?></td>
                                                    <td><?php echo $categoryData[$i]["date"] ?></td>
                                                    <td><?php echo $categoryData[$i]["time"] ?></td>
                                                    <td>
                                                        <span class="ml-5">
                                                            <label class="cstm-switch">
                                                                <input type="checkbox"
                                                                    data-this-id="<?php echo $categoryData[$i]['id']; ?>"
                                                                    <?php if ($categoryData[$i]['status'] == 2) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?> name="option"
                                                                    class="cstm-switch-input change-status">
                                                                <span class="cstm-switch-indicator"></span>
                                                            </label>
                                                        </span>
                                                    </td>
                                                    <td id="<?php echo $categoryData[$i]["id"] ?>"
                                                        class="<?php echo $categoryData[$i]["name"] ?>">
                                                        <button data-toggle="modal" data-target="#editModal"
                                                            type="button" class="btn btn-primary edit-btn">Edit</button>
                                                        <a href="./auctionCategory.php?id=<?php echo $categoryData[$i]["id"] ?>"
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./auctionCategory.php" method="post">
                        <div class="modal-body">
                            <input type="text" name="auction-category" class="form-control" placeholder="Add Category">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./updateAuctionCategory.php" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id-input">
                            <input id="edit-form" type="text" name="name" class="form-control"
                                placeholder="Add Category">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
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
</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>