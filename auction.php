<?php
require_once "./session.php";
require_once "./model/auction.php";
require_once "./model/participant.php";

$auction = new Auction();
$pageName = "Auction Page";

if (!isset($_GET["category"])) {
    header("HTTP/1.0 404 Not Found");
    die();
}
function getAuctionParticipants($auctionId, $totalParticipants)
{
    $participant = new Participant();
    $participants = count($participant->read($id = $auctionId));
    $percent = round(($participants / $totalParticipants) * 100);
    return $percent;
}
$category = $_GET["category"];
if ($category == "upcoming_auction") {
    $pageName = "Upcoming Auction";
    $auctionData = $auction->getDealOfTheDay();
} else if ($category == "featured_auction") {
    $pageName = "Featured Auction";
    $auctionData = $auction->getFeatured();
} else if ($category == "popular_auction") {
    $pageName = "Popular auction";
    $auctionData = $auction->getPopular();
} else {
    header("HTTP/1.0 404 Not Found");
    die();
}
?>
<?php require_once "./header.php" ?>
<section class="Banner_Section_div">
    <h1 class="text-white"><?php echo $pageName; ?></h1>
</section>
<div class="container-fluid padding_side" style="margin: 30px 0px">
    <div class="row">
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
                            <div class="progress-bar" role="progressbar" style="width: <?php echo getAuctionParticipants($a["id"], $a["capacity"]) ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <?php echo getAuctionParticipants($a["id"], $a["capacity"]) ?>%</div>
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
                            <?php if (isset($_SESSION["email"])) : ?>
                                <?php if (!isParticepeted($_SESSION["email"], $a["id"])) : ?>
                                    <a href="./registerAuction.php?id=<?php echo $a["id"] ?>&token_value=<?php echo $a["starting_price"] ?>" class="Subcribe_button">Subscribe for
                                        <?php echo $a["starting_price"] ?></a>
                                <?php else : ?>
                                    <button class="btn btn-primary disabled" type="button">Subscribe</button>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="./registerAuction.php?id=<?php echo $a["id"] ?>&token_value=<?php echo $a["starting_price"] ?>" class="Subcribe_button">Subscribe for
                                    <?php echo $a["starting_price"] ?></a>

                            <?php endif; ?>
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
    </div>
</div>
<?php require_once "./footer2.php" ?>