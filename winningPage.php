<?php
require_once "./session.php";
require_once "./model/bids.php";
require_once "./model/auction.php";

if (!isset($_GET["id"])) {
    header('HTTP/1.1 404 Not Found');
    die();
}

$bids = new Bids();
$auction = new Auction();

$pageName = "winners";
$auctionData = $auction->read($id = $_GET["id"])[0];
$winnerData = array_slice($auctionData, 0, 3);
$bidders = $bids->getReverceSortedBids($_GET["id"]);
// echo "<pre>";
// print_r($bidders);
// echo "</pre>";
// die();
// $topThreeBidders = array_slice($bidders, 2);
// print_r($topThreeBidders);
// die();
?>

<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- winning> -->
    <section class="winner_section side_padding">
        <div class="container-fluid padding_one">

            <!-- Auction win heading -->
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-center"><?php echo $auctionData["product_name"] ?> Auction Results</h1>
                    <h5 class="text-center light_para my-3">
                        Winner of this auction is <strong><?php echo $bidders[0]["username"] ?></strong>
                    </h5>
                </div>
            </div>
            <!-- Auction win heading -->

            <!-- Auction win cards section -->
            <div class="row pt-5 pb-3 justify-content-center">

                <div class="col-12 col-sm-10 col-md-10 col-lg-5 col-xxl-3 mb-5 mb-lg-0">
                    <!-- auction win card -->
                    <div class="AuctionWinner_Card_div">
                        <!-- Acution winning inner card -->
                        <div class="Auction_Winner_inner_card text-center">
                            <h3 class="mt-2">GRAND WINNER</h3>

                            <div class="User_Winner py-3 mt-3 mb-2">
                                <!-- all winner users -->
                                <div class="User_Winner_Div second_winner">
                                    <?php if ($bidders[1]["profile_img"]) : ?>
                                    <img src="./media/img/users/<?php echo $bidders[1]["profile_img"] ?>" alt=""
                                        class="img-fluid">
                                    <?php else : ?>
                                    <img src="./media/img/users/default.png" alt="" class="img-fluid">
                                    <?php endif; ?>
                                    <!-- user content -->
                                    <div class="user_Price_Contnet">
                                        <p><?php echo $bidders[1]["username"] ?></p>
                                        <h3><?php echo $bidders[1]["amount"] ?></h3>
                                    </div>
                                    <!-- user content -->

                                </div>
                                <div class="User_Winner_Div first_winner">
                                    <?php if ($bidders[0]["profile_img"]) : ?>
                                    <img src="./media/img/users/<?php echo $bidders[0]["profile_img"] ?>" alt=""
                                        class="img-fluid">
                                    <?php else : ?>
                                    <img src="./media/img/users/default.png" alt="" class="img-fluid">
                                    <?php endif; ?>
                                    <!-- user content -->
                                    <div class="user_Price_Contnet">
                                        <p><?php echo $bidders[0]["username"] ?></p>
                                        <h3><?php echo $bidders[0]["amount"] ?></h3>
                                    </div>
                                    <!-- user content -->

                                </div>
                                <div class="User_Winner_Div third_winner">
                                    <?php if ($bidders[2]["profile_img"]) : ?>
                                    <img src="./media/img/users/<?php echo $bidders[2]["profile_img"] ?>" alt=""
                                        class="img-fluid">
                                    <?php else : ?>
                                    <img src="./media/img/users/default.png" alt="" class="img-fluid">
                                    <?php endif; ?>
                                    <!-- user content -->
                                    <div class="user_Price_Contnet">
                                        <p><?php echo $bidders[2]["username"] ?></p>
                                        <h3><?php echo $bidders[2]["amount"] ?></h3>
                                    </div>
                                    <!-- user content -->

                                </div>
                                <!-- all winner users -->
                            </div>

                            <!-- <div class="Winner_Time py-2 mt-5 mb-2"></div> -->

                        </div>
                        <!-- Acution winning inner card -->
                        <div class="auctionCard_Content py-3">
                            <!-- All Card -->
                            <?php for ($i = 0; $i < count($winnerData); $i++) : ?>
                            <div class="allCard_div my-3">
                                <div class="row  gx-0">
                                    <div
                                        class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center">
                                        <p><?php echo $i + 1 ?></p>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center my-2 my-md-0">
                                        <div class="uerWinner_icons">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                        <p><?php echo $bidders[$i]["username"] ?></p>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center my-2 my-md-0">
                                        <p><?php echo $bidders[$i]["amount"] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                            <!-- All Card -->
                        </div>

                    </div>

                    <!-- auction win card -->
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xxl-9">
                    <!-- all auction winner -->
                    <div class="row">
                        <div class="col-12">
                            <div class="auctionList_div_content">
                                <div class="row">
                                    <div
                                        class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-center">
                                        <h2 class="text-white mb-3 mb-md-0">AUCTION LIST</h2>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-center">
                                        <button class="Register_Button">
                                            View All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <?php foreach ($bidders as $bidder) : ?>
                        <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                            <div class="row user_sub_cards">
                                <div
                                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                                    <div class="user_sub_img ">
                                        <?php if ($bidder["profile_img"]) : ?>
                                        <img src="./media/img/users/<?php echo $bidder["profile_img"] ?>" alt=""
                                            class="img-fluid">
                                        <?php else : ?>
                                        <img src="./media/img/users/default.png" alt="" class="img-fluid">
                                        <?php endif; ?>
                                    </div>
                                    <div class="user_sub_card ms-4">
                                        <h1><?php echo $bidder["username"] ?></h1>
                                        <p class="light_para"><?php echo $bidder["amount"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- all auction winner -->
                </div>

            </div>
            <!-- Auction win cards section -->
        </div>
    </section>
    <!-- winning> -->
</main>


<!-- Footer -->
<?php require_once "./footer2.php" ?>