<?php
require_once "./model/auction.php";
require_once "./model/wallet.php";
require_once "./model/users.php";
require_once "./model/participant.php";
require_once "./session.php";

$auction = new Auction();
$auctionData = $auction->read();
if (isset($_GET["id"]) && isset($_GET["token"])) {
    if (!isset($_SESSION["userId"])) {
        header("Location: ./logIn.php");
        die();
    }
    $id  = $_GET["id"];
    $price = $_GET["token"];
    $wallet = new Wallet();
    $users = new Users();
    $participant = new Participant();

    $walletData = array(
        "user_id" => $_SESSION["userId"],
        "use_type" => "remove",
        "token_value" => $price,
        "auction_id" => $id
    );
    $participantData = array(
        "auction_id" => $id,
        "user_email" => $_SESSION["email"]
    );

    try {
        $users->updateBidToken("remove", $price, $_SESSION["userId"]);
    } catch (Exception $e) {
        echo "You Don't have enough token";
        die();
    }
    $wallet->create($walletData);
    $participant->create($participantData);
}
?>

<?php require_once "./header.php" ?>
<section class="popular_action_section main_bg">
    <div class="container-fluid side_padding">

        <!-- Popular action heading -->
        <!-- <div class="row">
            <div class="col-12 ">
                <div class="hot_it_works_heading text-center py-3">
                    <h1>POPULAR <span class="span_color_2">AUCTION</span></h1>
                    <div class="line_div my-4"></div>
                </div>
            </div>
        </div> -->
        <!-- Popular action heading -->

        <!-- Popular Auction products card -->
        <div class="row pb-5 p-2">
            <?php foreach ($auctionData as $a) : ?>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <!-- Popular cards -->
                <div class="popular_auction_card_div text-center py-3">

                    <!-- Auction Products badge-->
                    <div class="Auction_products_badge">
                        <p class="text-white">Trend</p>
                    </div>
                    <!-- Auction Products badge-->

                    <!-- Products Images -->
                    <img src="./media/img/product/<?php echo $a["product_img"] ?>" alt="" class="img-fluid">
                    <!-- Products Images -->
                    <!-- Products Content -->
                    <div class="Auction_products_content mt-3">
                        <h2><?php echo $a["product_name"] ?></h2>
                        <p class="my-3 light_para">Auction house filled at:</p>

                        <!-- Product Input Progress bar -->
                        <div class="progress auction_progress_bar mt-2 mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <!-- Product Input Progress bar -->

                        <!-- Auction Price div -->
                        <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                            <!-- Store price -->
                            <div class="auction_price_inner_div">
                                <p class="light_para">Store price</p>
                                <h3><?php echo $a["store_price"] ?></h3>
                            </div>
                            <!-- Start Price -->
                            <div class="auction_price_inner_div">
                                <p class="light_para">Starting price</p>
                                <h3><?php echo $a["starting_price"] ?></h3>
                            </div>
                        </div>
                        <!-- Auction Price div -->

                        <!-- Subcribe button -->
                        <div class="mt-4 mb-5">
                            <a href="./auction.php?id=<?php echo $a["id"] ?>&token=<?php echo $a["starting_price"] ?>"
                                class="Subcribe_button">Subscribe for
                                <?php echo $a["starting_price"] ?></a>
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3"> Scheduled on <?php echo $a["date"] ?> <?php echo $a["time"] ?>
                            </h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
                <!-- Popular cards -->
            </div>
            <?php endforeach; ?>
            <!-- Popular cards -->
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-2 mb-5 d-flex justify-content-center ">
                    <button class="Subcribe_button">See All Auction</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Auction products card -->

    </div>
</section>
<?php require_once "./footer.php" ?>