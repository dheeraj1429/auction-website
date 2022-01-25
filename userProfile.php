<?php
require_once "session.php";
require_once "model/users.php";
require_once "model/bids.php";
require_once "model/auctionCategory.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}

function getCategory($categoryId)
{
    $auctionCategory = new AuctionCategory();
    $data = $auctionCategory->read($id = $categoryId)[0];
    return $data;
}

$users = new Users();
$bids = new Bids();
$pageName = "Profile page";
$userData = $users->read($userEmail = $_SESSION["email"])[0];
$userBidData = $bids->getUserBid($_SESSION["userId"]);
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">MY <span>BET</span></h1>
    </section>
    <!-- Banner section -->

    <!-- My BET -->
    <div class="My_Bet_section padding_one main_bg">
        <div class="container-fluid side_padding">
            <!-- User Profile div -->
            <div class="row">
                <div class="col-12 py-5 user_margin_class">
                    <div class="user_products_card d-flex align-items-center">
                        <div class="user_CR">
                            <?php if ($userData["profile_img"]) : ?>
                            <img src="./media/img/users/<?php echo $userData["profile_img"] ?>" alt="" />
                            <?php else : ?>
                            <img src="./media/img/users/default.png" alt="" />
                            <?php endif; ?>
                            <a href="./MyAccount.php">
                                <div class="edit_option">
                                    <img src="./assests/icons&images/mybit/pencil 1.png" alt="" />
                                </div>
                            </a>
                        </div>

                        <div class="ms-4 mt-4 mt-mb-0">
                            <h3><?php echo $userData["username"] ?></h3>
                            <p><?php echo $userData["email"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile div -->

            <!-- MY bet heading -->
            <div class="row">
                <div class="col-12">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>MY <span class="span_color_2">BET</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- MY bet heading -->

            <div class="row justify-content-center pb-5 p-2">
                <?php foreach ($userBidData as $userBid) : ?>
                <div
                    class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                    <!-- Products Cards -->
                    <div class="Auctions_products_cards text-center p-3">
                        <!-- Products Images -->
                        <img src="./media/img/product/<?php echo $userBid["product_img"] ?>"
                            alt="<?php echo $userBid["product_name"] ?>" class="img-fluid my-4" />
                        <!-- Products Images -->

                        <!-- content -->
                        <div class="Auction_Products_Cards_content">
                            <h3><?php echo $userBid["product_name"] ?></h3>
                            <h5><?php echo getCategory($userBid["category"])["name"] ?></h5>
                            <h3 style="color: lightseagreen">
                                You bid for <?php echo $userBid["amount"] ?>
                            </h3>
                            <!-- Instead price -->
                            <!-- Instead price -->

                            <!-- Add to card -->
                            <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                            <!-- Add to card -->
                        </div>
                        <!-- content -->
                    </div>
                    <!-- Products Cards -->
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="mt-3 d-flex justify-content-center">
                        <a href="./currentAuctions.html">
                            <button class="Subcribe_button">See All Auction</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My BET -->
</main>

<!-- Footer -->
<?php require_once "./footer2.php" ?>