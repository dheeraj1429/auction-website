<?php
require_once "../session.php";
require_once "../model/package.php";

$package = new Package();

$packages = $package->read();

$pageName = "Packages";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_GET["id"]) && isset($_GET["params"])) {
    if ($_GET["params"] == "delete") {
        $package->delete($_GET["id"]);
        header("Location: ./package.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST["price"];
    $click = $_POST["click"];

    if (isset($_GET["params"]) && $_GET["params"] == "edit") {
        $updatedData = array("price" => $price, "clicks" => $click);
        $id = $_POST["id"];
        $package->update($updatedData, $id);
        header("Location: ./package.php");
        die();
    }

    $data = array("price" => $price, "clicks" => $click);
    $package->create($data);
    header("Refresh: 0");
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
                                    <div style="display: flex; justify-content: space-between">
                                        <h4>Package</h4>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#package-model">
                                            Add
                                        </button>
                                    </div>
                                    <div class="table-responsive p-t-10">
                                        <table class="table" style="width: 100%;">
                                            <thead>
                                                <th>Id</th>
                                                <th>Price</th>
                                                <th>Clicks</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($packages); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1; ?></td>
                                                    <td>$<?php echo $packages[$i]["price"]; ?></td>
                                                    <td><?php echo $packages[$i]["clicks"]; ?></td>
                                                    <td>
                                                        <div style="display: flex;">
                                                            <button id="<?php echo $packages[$i]["id"] ?>"
                                                                data-toggle="modal" data-target="#editModal"
                                                                type="button"
                                                                class="btn btn-primary edit-btn <?php echo $packages[$i]["clicks"] ?> <?php echo $packages[$i]["price"] ?>">Edit</button>
                                                            <a href="./package.php?id=<?php echo $packages[$i]["id"] ?>&params=delete"
                                                                type="button" class="btn btn-danger">Delete</a>
                                                        </div>
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
    <div class="modal fade" id="package-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="number" name="price" class="form-control" placeholder="$Price"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" name="click" class="form-control" placeholder="Clicks"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="./package.php?params=edit">
                    <div class="modal-body">
                        <input id="id" type="hidden" name="id">
                        <div class="input-group mb-3">
                            <input type="number" name="price" id="price" class="form-control" placeholder="$Price"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" name="click" id="click" class="form-control" placeholder="Clicks"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    const editBtns = document.getElementsByClassName("edit-btn");
    for (let btn of editBtns) {
        btn.onclick = () => {
            const id = btn.id;
            const clicks = btn.classList[3];
            const price = btn.classList[4];
            console.log(btn.classList);
            document.getElementById("price").value = price;
            document.getElementById("click").value = clicks;
            document.getElementById("id").value = id;
        }
    }
    </script>
</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>