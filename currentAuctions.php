<?php
require_once "./session.php";
require_once "./model/auction.php";
require_once "./model/auctionCategory.php";


function getAucitonCategory($id)
{
   $auctionCategory = new AuctionCategory();
   $category = $auctionCategory->read($id = $id)[0];
   return $category["name"];
}

$auction = new Auction();
$bestSeller = $auction->getMinimumPriceAuction()[0];
$currentAuction = $auction->getCurrentAuction();
$isAuction = false;

if ($currentAuction) {
   $isAuction = true;
}
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">CURRENT <span>AUCTIONS</span></h1>
    </section>
    <!-- Banner section -->
    <!--Smartphone-->
    <div class="container-fluid main_bg pt-5">
        <section class="container">
            <div class="row align-items-center pt-3">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4 mb-md-0">
                    <img src="./media/img/product/<?php echo $bestSeller["product_img"] ?>" class="img-fluid" />
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 currentAuction_container1">
                    <p class="currentAuction_container1-para mb-0">
                        <?php echo getAucitonCategory($bestSeller["category"]) ?></p>
                    <div class="currentAuction_heading">
                        <h2 class="mb-0"><?php echo $bestSeller["product_name"] ?></h2>
                        <span class="currentAuction_line"></span>
                    </div>
                    <p class="currentAuction_container1-para2 mt-2">
                        <?php echo $bestSeller["discription"] ?>
                    </p>
                    <p class="currentAuction_container1-para">Best Seller</p>
                    <p class="currentAuction_container1-para3">Instead of
                        <del>$<?php echo $bestSeller["store_price"] ?></del>
                        <span>$<?php echo $bestSeller["starting_price"] ?></span>
                    </p>
                    <!-- <button type="button" class="cart_btn">Add To Cart</button> -->
                </div>
            </div>
        </section>
    </div>
    <!--Smartphone-->
    <!--Products-->
    <section class="side_padding main_bg">
        <div class="container-fluid padding_one">
            <!-- Upcomming changes section products -->
            <?php if (!$isAuction) : ?>
            <div style="width: 100%; display: flex; align-items: center; justify-content: center">
                <h4>No Auctions started yet!</h4>
            </div>
            <?php else : ?>
            <div class="row mt-5">
                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 10.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-md-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 26.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-xxl-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 9.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-xxl-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 10.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    100%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
                <!-- Popular cards -->
            </div>
            <div class="row mt-5">
                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/Group 335.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-md-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/Group 334.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-xxl-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/Group 333.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    25%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 mt-5 mt-xxl-0">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/Group 147.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    100%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3>$109</h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3>$15</h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <button class="Subcribe_button">Subscribe for $15</button>
                            </div>
                            <!-- Subcribe button -->
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3">Scheduled on 2022-01-09 19:00:00</h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
                <!-- Popular cards -->
            </div>
            <?php endif; ?>
            <!-- Upcomming changes section products -->
        </div>
    </section>
    <!--/ Products-->

    <!-- News Letter Section -->

    <section class="news_letter_sectionside_padding main_bg">
        <div class="container-fluid padding_one">
            <div class="row gx-0">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <!-- News letter div -->
                    <div class="news_letter_inner_div">
                        <div class="row px-3 align-items-center">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <h1>Receive our newsletter:</h1>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-xl-7 col-xxl-8">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-12 col-md-8 col-lg-9 my-4 my-md-0">
                                        <div class="input_group_div">
                                            <div class="inner_input d-flex">
                                                <input type="email" placeholder="Enter your Email" />
                                                <div class="news_icons">
                                                    <img src="./assests/icons&images/Layer 2.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-2">
                                        <!-- News letter button -->
                                        <button class="send_button">Send</button>
                                        <!-- News letter button -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- News letter div -->
                </div>
            </div>
        </div>
    </section>
    <!-- News Letter Section -->
</main>
<!-- Footer -->
<!-- Footer -->

<?php require_once "./footer2.php" ?>