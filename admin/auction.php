<?php
include_once("../session.php");
require_once "../model/auction.php";
$pageName = "Auction Page";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

$aucion = new Auction();
$auctionData = $aucion->read();
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
                                    <div style="display: flex; justify-content: space-between">
                                        <h4>Auction</h4>
                                        <a href="./addAuction.php" role="button" class="btn btn-primary">Add</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Product Name</th>
                                                <th>Starting Price</th>
                                                <th>Capacity</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Store Price</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($auctionData); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i  + 1 ?></td>
                                                    <td><?php echo $auctionData[$i]["product_name"] ?></td>
                                                    <td><?php echo $auctionData[$i]["starting_price"] ?></td>
                                                    <td><?php echo $auctionData[$i]["capacity"] ?></td>
                                                    <td><?php echo $auctionData[$i]["date"] ?></td>
                                                    <td><?php echo $auctionData[$i]["time"] ?></td>
                                                    <td><?php echo $auctionData[$i]["store_price"] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary">Edit</button>
                                                        <button type="button" class="btn btn-danger">Delte</button>
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

</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>