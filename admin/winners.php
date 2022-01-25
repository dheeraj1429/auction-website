<?php
require_once "../session.php";
require_once "../model/bids.php";
require_once "../model/auction.php";

$pageName = "Winners";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

function getAuctionWinner($auctionId)
{
    $bids = new Bids();
    $winnerData = $bids->getWinnerBid($auctionId);
    return $winnerData[0];
}

$auction = new Auction();
$completedAuction = $auction->getCompleteAuctionONJoin();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>
    <title><?php echo $pageName . " | " . "Smart Auction" ?></title>
</head>

<body class="sidebar-pinned ">
    <style>
    img.profile-img {
        width: 25px;
        height: 25px;
        border-radius: 50%;
    }
    </style>
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
                                    <div class="center">
                                        <h2>Winnners</h2>
                                    </div>
                                    <table class="table" style="width: 100%;">
                                        <thead>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Auction Id</th>
                                            <th>Delivery Status</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($completedAuction as $ca) : ?>
                                            <tr>
                                                <?php $winnerData = getAuctionWinner($ca["id"]) ?>
                                                <td>
                                                    <?php if ($winnerData["profile_img"]) :
                                                        ?>
                                                    <img class="profile-img " src="../media/img/users/<?php echo $winnerData["profile_img"]
                                                                                                                ?>"
                                                        alt="profile-img">
                                                    <?php else :
                                                        ?>
                                                    <img class="profile-img" src="../media/img/users/default.png"
                                                        alt="profile-img">
                                                    <?php endif;
                                                        ?>
                                                </td>
                                                <td><?php echo $winnerData["username"]
                                                        ?></td>
                                                <td><?php echo $winnerData["email"]
                                                        ?></td>
                                                <td><?php echo $winnerData["auction_id"]
                                                        ?></td>
                                                <td>Status</td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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