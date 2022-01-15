<?php
require_once "./model/package.php";
require_once "./model/testomonial.php";
require_once "./model/blog.php";
require_once "./model/cmsPages.php";
require_once "session.php";

$package = new Package();
$testomonial = new Testomonial();
$blog = new Blog();
$cmsPages = new CMSPages();
$packages = $package->read();
$testomonials = $testomonial->read();
$blogs = $blog->getLatestBlog();
$howItWorks = $cmsPages->getCMSByType(2);
?>
<?php require_once "./header.php" ?>
<!-- Main-Navbar -->

<!-- Header -->

<!-- Main -->
<main>


    <!-- banner section -->
    <section class="header_banner_section"
        style="background-image: url(./media/img/cms/<?php echo $cmsPages->getCMSByType(1)[0]["img"] ?>)">
        <div class="banner_section_inner banner_padding">
            <div class="container-fluid side_padding">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <!-- Banner Content -->
                        <h1 class="text-white "><?php echo $cmsPages->getCMSByType(1)[0]["desc"] ?></h1>
                        <h3 class="secondey_text mb-5 mt-3">Find amazing items <span>today!</span></h3>
                        <!-- Banner Content -->


                        <!-- Banner Input Div -->
                        <div class="headerBanner_inner_input_div py-3 px-3">
                            <div class="headerBanner_input_inner py-4">
                                <div class="container-fluid">
                                    <div class="row">

                                        <!-- Search Input Div -->
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="headerBanner_server_div d-flex">
                                                <input type="text" placeholder="ENTER KEYWORD" />
                                                <div
                                                    class="headerBanner_search_icons_div d-flex align-items-center justify-content-center">
                                                    <img src="./assests/icons&images/search.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search Input Div -->

                                        <!-- Search Input Div -->
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="headerBanner_server_div d-flex">
                                                <input type="text" placeholder="ANY CATEGORY" />
                                                <div
                                                    class="headerBanner_search_icons_div d-flex align-items-center justify-content-center">
                                                    <img src="./assests/icons&images/dropdown.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search Input Div -->

                                        <!-- Search Input Div -->
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="headerBanner_server_div d-flex">
                                                <input type="text" placeholder="MAX PRICE" />
                                                <div
                                                    class="headerBanner_search_icons_div d-flex align-items-center justify-content-center">
                                                    <img src="./assests/icons&images/$.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search Input Div -->

                                        <!-- Search Input Div -->
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <!-- Search Button -->
                                            <button class="search_button">
                                                SEARCH
                                            </button>
                                            <!-- Search Button -->
                                        </div>
                                        <!-- Search Input Div -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Banner Input Div -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- banner section -->

    <!-- How it works -->
    <section class="how_it_works_section padding_one main_bg">
        <div class="container-fluid side_padding">

            <!-- How it works heading -->
            <div class="row">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>HOW IT <span class="span_color_2">WORKS</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- How it works heading -->

            <!-- How it works box seaction -->
            <div class="row">
                <?php foreach ($howItWorks as $w) : ?>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <!-- Step Images -->
                    <img src="./media/img/cms/<?php echo $w["img"] ?>" />
                    <!-- Step Images -->

                    <div class="step_Content_Div my-4">
                        <h3><?php echo $w["title"] ?></h3>
                        <div class="line_div my-3"></div>
                        <p><?php echo $w["desc"] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- How it works box seaction -->
            </div>
    </section>
    <!-- How it works -->

    <!-- Popular action -->
    <section class="popular_action_section main_bg">
        <div class="container-fluid side_padding">

            <!-- Popular action heading -->
            <div class="row">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>POPULAR <span class="span_color_2">AUCTION</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- Popular action heading -->

            <!-- Popular Auction products card -->
            <div class="row pb-5 p-2">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 10.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 9.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 10.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 9.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">100%</div>
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
                            <div class="mt-4 mb-5 d-flex">
                                <button class="Subcribe_button">Subscribe for $15</button>
                                <button class="Subcribe_button_sm text-white">Submit A Bid</button>
                            </div>
                        </div>
                        <!-- Subcribe button -->

                        <!-- Shecdule time div -->
                        <div class="Shedule_div py-2">
                            <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
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
    <!-- Popular action -->

    <!-- DEALS OF THE DAY -->
    <section class="deal_of_the_day padding_one">
        <div class="container-fluid side_padding">
            <div class="row py-5">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="deal_of_the_day_banne_div">
                        <img src="./assests/icons&images/Group 412.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <!-- Deal of the day slide & content -->
                    <div class="row py-3 deal_of_main_div">
                        <div class="col-12">
                            <div class="Deal_of_heading_div">
                                <h1>DEALS OF THE <span class="span_color_2">DAY</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Deal of the day slide & content -->
                    <!-- Deal of the day slide products -->
                    <div class="row pt-5 slider">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 335.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 334.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 333.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 333.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                    </div>
                    <!-- Deal of the day slide products -->
                </div>
            </div>
        </div>
    </section>
    <!-- DEALS OF THE DAY -->

    <!-- Upcomming changes section -->
    <section class="upcomming_auction padding_one main_bg">
        <div class="container-fluid side_padding">

            <!-- Upcomming changes section heading -->
            <div class="row">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>UPCOMMING <span class="span_color_2">AUCTIONS</span></h1>
                        <div class="line_div my-4"></div>
                        <p class="light_para">You are welcome to attend and join in the action at any of our
                            upcoming auctions.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Upcomming changes section heading -->

            <!-- Upcomming changes section tabs div -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="upcomming_auction_div_tabs_div d-flex justify-content-center">
                        <!-- Tabs -->
                        <div class="tabs_card d-flex justify-content-around align-items-center">
                            <!-- Tabs Content -->
                            <div>
                                <p>All</p>
                            </div>
                            <div>
                                <p>Live Auction</p>
                            </div>
                            <div>
                                <p>Time Auction</p>
                            </div>
                            <div>
                                <p>Buy Now</p>
                            </div>
                            <!-- Tabs Content -->
                        </div>
                        <!-- Tabs -->
                    </div>
                </div>
            </div>
            <!-- Upcomming changes section tabs div -->

            <!-- Upcomming changes section products -->
            <div class="row pb-5 mt-5 p-2">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 25.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 26.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 27.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/pngwing 1.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">100%</div>
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
                            <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
                <!-- Popular cards -->
            </div>
            <!-- Upcomming changes section products -->

            <!-- Upcomming changes section products -->
            <div class="row pb-5 p-2">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 13.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/Group 147.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 15.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
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
                                <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                            </div>
                            <!-- Shecdule time div -->
                        </div>
                        <!-- Products Content -->
                    </div>
                    <!-- Popular cards -->
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/image 16.png" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">100%</div>
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
                            <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                        </div>
                        <!-- Shecdule time div -->
                    </div>
                    <!-- Products Content -->
                </div>
                <!-- Popular cards -->
            </div>
            <!-- Upcomming changes section products -->

        </div>
    </section>
    <!-- Upcomming changes section -->

    <!-- Featured auction section -->
    <section class="deal_of_the_day padding_one">
        <div class="container-fluid side_padding">
            <div class="row py-5">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="deal_of_the_day_banne_div">

                        <div class="Featured_auction_banner_div Featured_Banner_One">
                            <div>
                                <h1>Modern ideas for electronic shops</h1>
                                <button class="View_More_Button mt-3 mb-2">View More</button>
                            </div>
                        </div>
                        <div class="Featured_auction_banner_div Featured_Banner_Two">
                            <div>
                                <h1>you wan’t believe you eyes</h1>
                                <button class="View_More_Button mt-3 mb-2">View More</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <!-- Featured auction section content -->
                    <div class="row py-3 deal_of_main_div">
                        <div class="col-12">
                            <div class="Deal_of_heading_div">
                                <h1>FEATURED <span class="span_color_2">AUCTIONS</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Featured auction section content -->
                    <!-- Featured auction section products -->
                    <div class="row pt-5 slider">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 335.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 334.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 333.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./assests/icons&images/Group 333.png" alt="" class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2>Apple Cinema 30"</h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
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
                                        <h3 class="text-white mb-3"> Scheduled on 2022-01-09 19:00:00 </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                    </div>
                    <!-- Featured auction section products -->
                </div>
            </div>
        </div>
    </section>
    <!-- Featured auction section -->

    <!-- Testimonials Section -->
    <section class="testimonial_section padding_one main_bg">
        <div class="container-fluid side_padding">

            <!-- Testimonial Section header -->
            <div class="row mb-4">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>TESTMONIALS OF OUR <span class="span_color_2">WINNERS</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Section header -->

            <!-- Testimonial Cards -->
            <div class="row slider2">
                <?php foreach ($testomonials as $t) : ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-12 p-3 slider_two item">
                    <div class="userCard_testimonial">
                        <!-- Testimonial cards content -->
                        <img style="width: 100px; height: 100px; border-radius: 50%;"
                            src="./media/img/testomonial/<?php echo $t["media"] ?>" alt=""
                            class="img-fluid user_profile">
                        <!-- Testimonial cards content -->

                        <div>
                            <div class="d-flex justify-content-between">
                                <img src="./assests/icons&images/Group 122.png" alt="" class="img-fluid my-3">
                                <img src="./assests/icons&images/Group 124.svg" alt="">
                            </div>
                            <p class="user_content_details"><?php echo $t["message"] ?></p>
                            <h4><?php echo $t["Name"] ?></h4>
                            <h5><?php echo $t["designation"] ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <div class="col-12 col-sm-12 col-md-6 col-lg-12 p-3 slider_two item">
                    <div class="userCard_testimonial">
                        <img src="./assests/icons&images/Ellipse 46.png" alt="" class="img-fluid user_profile">

                        <div>
                            <div class="d-flex justify-content-between">
                                <img src="/assests/icons&images/Group 122.png" alt="" class="img-fluid my-3">
                                <img src="/assests/icons&images/Group 124.svg" alt="">
                            </div>
                            <p class="user_content_details">Lorem, ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Necessitatibus
                                fugiat hic laborum, ipsam
                                minima magni dolore autem magnam fuga, dolorem repellendus officia temporibus
                                molestiae quisquam
                                illum,
                                dolor non rerum impedit!</p>
                            <h4>test</h4>
                            <h5>Consultant</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-12 p-3 slider_two item">
                    <div class="userCard_testimonial">
                        <img src="./assests/icons&images/Ellipse 46.png" alt="" class="img-fluid user_profile">

                        <div>
                            <div class="d-flex justify-content-between">
                                <img src="./assests/icons&images/Group 122.png" alt="" class="img-fluid my-3">
                                <img src="./assests/icons&images/Group 124.svg" alt="">
                            </div>
                            <p class="user_content_details">Lorem, ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Necessitatibus
                                fugiat hic laborum, ipsam
                                minima magni dolore autem magnam fuga, dolorem repellendus officia temporibus
                                molestiae quisquam
                                illum,
                                dolor non rerum impedit!</p>
                            <h4>Gabriel Nolan</h4>
                            <h5>Consultant</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-12 p-3 slider_two item">
                    <div class="userCard_testimonial">
                        <img src="./assests/icons&images/Ellipse 46.png" alt="" class="img-fluid user_profile">

                        <div>
                            <div class="d-flex justify-content-between">
                                <img src="./assests/icons&images/Group 122.png" alt="" class="img-fluid my-3">
                                <img src="./assests/icons&images/Group 124.svg" alt="">
                            </div>
                            <p class="user_content_details">Lorem, ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Necessitatibus
                                fugiat hic laborum, ipsam
                                minima magni dolore autem magnam fuga, dolorem repellendus officia temporibus
                                molestiae quisquam
                                illum,
                                dolor non rerum impedit!</p>
                            <h4>Gabriel Nolan</h4>
                            <h5>Consultant</h5>
                        </div>
                    </div>
                </div>
            </div> -->
                <!-- Testimonial Cards -->

            </div>
    </section>
    <!-- Testimonials Section -->

    <!-- Our Pricing Plans -->
    <section class="our_pricing_plan  main_bg">
        <div class="container-fluid side_padding">


            <!-- Our Pricing plan heading -->
            <div class="row ">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1 class="white_heading">TESTMONIALS OF OUR <span class="span_color_2">WINNERS</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- Our Pricing plan heading -->

        </div>
    </section>
    <!-- Our Pricing Plans -->


    <!-- Price_Cards -->
    <section class="products_price_div padding_one main_bg ">
        <div class="container-fluid price_card_margin_div pb-5 side_padding">
            <div class="row">
                <!-- Price div cards -->
                <?php foreach ($packages as $p) : ?>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="price_plan_card_inner_div">

                        <div class="price_plan_heading activeBar_plan text-center">
                            <h1 class="my-4"><?php echo $p["clicks"] ?> CLICK PACK</h1>
                        </div>

                        <div class="price_plan_heading_content px-4 py-3 text-center">
                            <p class="light_para my-4">The pack allows you to<br> have <?php echo $p["clicks"] ?>
                                aditional clicks<br> to
                                bid.</p>

                            <h2 class="Price_Dolar "><span>$</span><?php echo $p["price"] ?></h2>

                            <button class="View_More_Button my-3">Buy Now</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="price_plan_card_inner_div">

                        <div class="price_plan_heading activeBar_plan text-center">
                            <h1 class="my-4">15 CLICK PACK</h1>
                        </div>

                        <div class="price_plan_heading_content px-4 py-3 text-center">
                            <p class="light_para my-4">The pack allows you to<br> have 10 aditional clicks<br> to
                                bid.</p>

                            <h2 class="Price_Dolar "><span>$</span>19</h2>

                            <button class="View_More_Button my-3">Buy Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="price_plan_card_inner_div">

                        <div class="price_plan_heading activeBar_plan text-center">
                            <h1 class="my-4">20 CLICK PACK</h1>
                        </div>

                        <div class="price_plan_heading_content px-4 py-3 text-center">
                            <p class="light_para my-4">The pack allows you to<br> have 10 aditional clicks<br> to
                                bid.</p>

                            <h2 class="Price_Dolar "><span>$</span>25</h2>

                            <button class="View_More_Button my-3">Buy Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="price_plan_card_inner_div">

                        <div class="price_plan_heading activeBar_plan text-center">
                            <h1 class="my-4">25 CLICK PACK</h1>
                        </div>

                        <div class="price_plan_heading_content px-4 py-3 text-center">
                            <p class="light_para my-4">The pack allows you to<br> have 10 aditional clicks<br> to
                                bid.</p>

                            <h2 class="Price_Dolar "><span>$</span>35</h2>

                            <button class="View_More_Button my-3">Buy Now</button>
                        </div>
                    </div>
                </div>
                 Price div cards -->
            </div>
        </div>
    </section>
    <!-- Price_Cards -->

    <!-- Register for free start -->
    <section class="register_for_free padding_one">
        <div class="container-fluid side_padding">

            <div class="d-flex justify-content-between align-items-center">
                <!-- Register content div -->
                <div class="register_inner_div">
                    <h1 class="text-white">Register For Free & Start <br> Bidding Now!</h1>
                    <p class="text-white my-3">From cars to diamonds to iPhones, we have it all.</p>
                </div>
                <!-- Register content div -->
                <button class="Register_Button">Register</button>
            </div>

        </div>
    </section>
    <!-- Register for free start -->

    <!-- Latest News Update -->
    <section class="Latest_News_update padding_one main_bg">
        <div class="container-fluid side_padding">

            <!-- Our Pricing plan heading -->
            <div class="row ">
                <div class="col-12 ">
                    <div class="hot_it_works_heading text-center py-3">
                        <h1>LATEST NEWS <span class="span_color_2">UPDATE</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- Our Pricing plan heading -->

            <!-- News Post Div -->
            <div class="row py-3">
                <?php foreach ($blogs as $b) : ?>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- Posts -->
                    <div class="post_div">
                        <!-- Post Previwe -->
                        <div class="post_img_div">
                            <img src="./media/img/blog/<?php echo $b["img"] ?>" alt="">
                            <div class="post_date_div">
                                <h3 class="text-white"><?php echo date_format(date_create($b["post_date"]), "d M") ?>
                                </h3>
                            </div>
                        </div>
                        <!-- Post Previwe -->
                        <!-- Post Details -->
                        <div class="my-3 d-flex align-items-center">
                            <img src="./assests/icons&images/Group 4.svg" alt="">
                            <p class="ms-3 light_para">By Giulia May</p>
                        </div>

                        <h1><?php echo $b["name"] ?></h1>

                        <p class="post_discription light_para">
                            <?php echo htmlspecialchars_decode($b["short_desc"]) ?>
                        </p>
                        <!-- <p class="post_discription light_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Nulla nobis at fuga dolore voluptates nisi ut. Autem commodi ullam, veniam provident
                            explicabo earum! Saepe, soluta iusto. In laborum saepe sequi cupiditate quaerat non
                            recusandae consequuntur commodi blanditiis autem possimus officia iure sunt numquam nesciunt
                            cum, iusto ipsum? Nisi veritatis necessitatibus ullam. Praesentium, ducimus. Ut ipsam quos
                            illum doloremque inventore ex.</p> -->

                        <a href="./blog.php?id=<?php echo $b["id"] ?>" target="_blank" class=" Read_more_button
                            my-3">Read More <img src="./assests/icons&images/Vector (2).svg" alt=""></a>
                        <!-- Post Details -->
                    </div>
                    <!-- Posts -->
                </div>
                <?php endforeach; ?>

            </div>
    </section>
    <!-- Latest News Update -->

    <!-- News Letter Section -->
    <section class="news_letter_sectionside_padding main_bg">
        <div class="container-fluid padding_one">
            <div class="row gx-0">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <!-- News letter div -->
                    <div class="news_letter_inner_div">
                        <div class="row px-3">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                <h1>Receive our newsletter:</h1>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                                <div class="input_group_div d-flex">

                                    <!-- Input group icon and input -->
                                    <div class="inner_input d-flex">
                                        <input type="email" placeholder="Enter your Email">
                                        <div class="news_icons">
                                            <img src="./assests/icons&images/Layer 2.svg" alt="">
                                        </div>
                                    </div>
                                    <!-- Input group icon and input -->


                                    <!-- News letter button -->
                                    <button class="send_button ms-5">Send</button>
                                    <!-- News letter button -->
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
<!-- Main -->

<!-- Footer -->
<?php require_once "./footer.php" ?>