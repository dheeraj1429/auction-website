<?php
require_once "./model/auction.php";
require_once "./session.php";
require_once "./model/users.php";
require_once "./model/participant.php";


function getParticipantsByEmail($email)
{
    $participant = new Participant();
    $participantData = $participant->getParticipantsByEmail($email);
    if (empty($participantData)) {
        return false;
    }
    return true;
}

$isLogin = false;
$auction = new Auction();
$auctionData = $auction->read();
if (isset($_GET["id"])) {
    if (isset($_SESSION["email"])) {
        $users = new Users();
        $isLogin = true;
        $participant = new Participant();
        $userData = $users->read($_SESSION["email"])[0];
        $participantData = array("auction_id" => $_GET["id"], "email" => $userData["email"]);
        $participant->create($participantData);
    } else {
        header("Location: ./logIn.php");
    }
}
?>

<?php require_once "./header.php" ?>
<section class="popular_action_section main_bg" style="padding: 20px">
    <div class="container-fluid side_padding">

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
                                <h3>$<?php echo $a["store_price"] ?></h3>
                            </div>
                            <!-- Start Price -->
                            <div class="auction_price_inner_div">
                                <p class="light_para">Starting price</p>
                                <h3>$<?php echo $a["starting_price"] ?></h3>
                            </div>
                        </div>
                        <!-- Auction Price div -->

                        <!-- Subcribe button -->
                        <?php if ($isLogin) : ?>
                        <?php if (getParticipantsByEmail($_GET['email'])) : ?>
                        <div class="mt-4 mb-5">
                            <a href="./auction.php?id=<?php echo $a["id"] ?>" class="Subcribe_button">Starting on
                                <?php echo $a["data"] ?></a>
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3"> Scheduled on <?php echo $a["date"] ?> <?php echo $a["time"] ?>
                            </h3>
                        </div>
                        <?php else : ?>
                        <div class="mt-4 mb-5">
                            <a href="./auction.php?id=<?php echo $a["id"] ?>" class="Subcribe_button">Subscribe for
                                $<?php echo $a["starting_price"] ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="mt-4 mb-5">
                            <a href="./auction.php?id=<?php echo $a["id"] ?>" class="Subcribe_button">Subscribe for
                                $<?php echo $a["starting_price"] ?></a>
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3"> Scheduled on <?php echo $a["date"] ?> <?php echo $a["time"] ?>
                            </h3>
                        </div>
                        <?php endif; ?>
                        <div class="mt-4 mb-5">
                            <a href="./auction.php?id=<?php echo $a["id"] ?>" class="Subcribe_button">Subscribe for
                                $<?php echo $a["starting_price"] ?></a>
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
    </div>
    <!-- Popular Auction products card -->

    </div>
</section>
<?php require_once "./footer.php" ?>