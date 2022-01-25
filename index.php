<?php
require_once "./model/package.php";
require_once "./model/testomonial.php";
require_once "./model/blog.php";
require_once "./model/cmsPages.php";
require_once "./model/participant.php";
require_once "./model/auction.php";
require_once "./functions.php";
require_once "session.php";

$package = new Package();
$testomonial = new Testomonial();
$blog = new Blog();
$cmsPages = new CMSPages();
$auction = new Auction();

$pageName = "Home";

$packagePaginationData = pagination($package->getStandardTokens(), 1, 4);
$packages = $packagePaginationData["data"];
$testomonials = $testomonial->read();
$blogs = pagination($blog->getLatestBlog(), 1, 3)["data"];

if (count($blogs) > 3) {
    $blogs = array_slice($blogs, 0, 3);
}

$howItWorks = $cmsPages->getCMSByType(2);

function getAuctionParticipants($auctionId, $totalParticipants)
{
    $participant = new Participant();
    $participants = count($participant->read($id = $auctionId));
    $percent = round(($participants / $totalParticipants) * 100);
    return $percent;
}

$featuredAuction = $auction->getFeatured();
$dealOfTheDay = $auction->getDealOfTheDay();
$popularAuctionPaginationData = pagination($auction->getPopular(), 1, 4);
$upcomingAuctionPaginationData = pagination($auction->getUpcomingAuction(), 1, 4);
$completedAuctionsPaginationData = pagination($auction->getCompleteAuction(), 1, 4);
$liveAuctionPaginationData = pagination($auction->getCurrentAuction(), 1, 8);
$allAuctionPaginationData = pagination($auction->getLiveAndUpcomingAuction(), 1, 8);

$liveAuction = $liveAuctionPaginationData["data"];
$popularAuction = $popularAuctionPaginationData["data"];
$upcomingAuction = $upcomingAuctionPaginationData["data"];
$allAuctionData = $allAuctionPaginationData["data"];
$completedAuctions = $completedAuctionsPaginationData["data"];
?>
<?php require_once "./header.php" ?>
<!-- Main-Navbar -->

<!-- Header -->

<!-- Main -->
<main>


    <!-- banner section -->
    <section class="header_banner_section">
        <div class="banner_section_inner banner_padding">
            <div class="container-fluid side_padding">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-white">SMART AUCTION</h1>
                        <h3 class="text-white my-3">THE NEW WAY TO <br> BUY!</h3>
                        <p class="text-white">This is a shopping platform unlike any other ...</p>
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
                <?php foreach ($popularAuction as $p) : ?>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">

                        <!-- Products Images -->
                        <img src="./media/img/product/<?php echo $p["product_img"] ?>" alt="" class="img-fluid">
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2><?php echo $p["product_name"]; ?></h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar"
                                    style="width: <?php echo getAuctionParticipants($p["id"], $p["capacity"]); ?>%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo getAuctionParticipants($p["id"], $p["capacity"]); ?>%
                                </div>
                            </div>
                            <!-- Product Input Progress bar -->

                            <!-- Auction Price div -->
                            <div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                <!-- Store price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Store price</p>
                                    <h3><?php echo $p["store_price"] ?></h3>
                                </div>
                                <!-- Start Price -->
                                <div class="auction_price_inner_div">
                                    <p class="light_para">Starting price</p>
                                    <h3><?php echo $p["starting_price"] ?></h3>
                                </div>
                            </div>
                            <!-- Auction Price div -->

                            <!-- Subcribe button -->
                            <div class="mt-4 mb-5">
                                <?php if (isset($_SESSION["email"])) : ?>
                                <?php if (!isAuctionStarted($p["date"], $p["time"], $p["end_time"]) && isParticepeted($_SESSION["email"], $p["id"])) : ?>
                                <?php if (!isParticepeted($_SESSION["email"], $p["id"])) : ?>
                                <a href="./registerAuction.php?auction_id=<?php echo $p["id"] ?>&token_value=<?php echo $p["starting_price"] ?>"
                                    class="Subcribe_button">Subscribe for
                                    <?php echo $p["starting_price"] ?></a>
                                <?php else :  ?>
                                <button type="button" class="btn btn-primary" disabled>Subscribed</button>
                                <?php endif; ?>
                                <?php else : ?>
                                <a href="./auctionpage.php?token=<?php echo $p["token"] ?>"
                                    class="Subcribe_button">Participate</a>
                                <?php endif; ?>
                                <?php else : ?>
                                <a href="./registerAuction.php?auciton_id=<?php echo $p["id"] ?>&token_value=<?php echo $p["starting_price"] ?>"
                                    class="Subcribe_button">Subscribe for
                                    <?php echo $p["starting_price"] ?></a>
                                <?php endif; ?>
                            </div>
                            <!-- Subcribe button -->

                            <!-- Shecdule time div -->
                            <div class="Shedule_div py-2">
                                <h3 class="text-white mb-3"> Scheduled on <?php echo $p["date"] ?>
                                    <?php echo $p["time"] ?> </h3>
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

            <?php if ($popularAuctionPaginationData["nextPage"]) : ?>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="mt-2 mb-5 d-flex justify-content-center ">
                        <a href="./auction.php?category=popular_auction" role="button" class="Subcribe_button">See All
                            Auction</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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
                        <?php foreach ($dealOfTheDay as $d) : ?>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-12 item">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <div class="d-flex justify-content-center">
                                    <!-- Products Images -->
                                    <img src="./media/img/product/<?php echo $d["product_img"] ?>" alt=""
                                        class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2><?php echo $d["product_name"] ?></h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo getAuctionParticipants($d["id"], $d["capacity"]) ?>%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo getAuctionParticipants($d["id"], $d["capacity"], $d["end_time"]) ?>%
                                        </div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                        <!-- Store price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Store price</p>
                                            <h3><?php echo $d["store_price"] ?></h3>
                                        </div>
                                        <!-- Start Price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Starting price</p>
                                            <h3><?php echo $d["starting_price"] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Auction Price div -->

                                    <!-- Subcribe button -->
                                    <div class="mt-4 mb-5">
                                        <?php if (isset($_SESSION["email"])) : ?>
                                        <?php if (!isAuctionStarted($d["date"], $d["time"], $d["end_time"]) && isParticepeted($_SESSION["email"], $d["id"])) : ?>
                                        <?php if (!isParticepeted($_SESSION["email"], $d["id"])) : ?>
                                        <a href="./registerAuction.php?auction_id=<?php echo $d["id"] ?>&token_value=<?php echo $d["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $d["starting_price"] ?></a>
                                        <?php else :  ?>
                                        <button type="button" class="btn btn-primary" disabled>Subscribed</button>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <a href="./auctionpage.php?token=<?php echo $d["token"] ?>"
                                            class="Subcribe_button">Participate</a>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <a href="./registerAuction.php?auciton_id=<?php echo $d["id"] ?>&token_value=<?php echo $d["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $d["starting_price"] ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Subcribe button -->

                                    <!-- Shecdule time div -->
                                    <div class="Shedule_div py-2">
                                        <h3 class="text-white mb-3"> Scheduled on <?php echo $d["date"] ?>
                                            <?php echo $d["time"] ?> </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <?php endforeach; ?>
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
                            <div class="tab_div active_tab_div" id="active-tab">
                                <p class="active_tab tab" id="active-tab-text">All</p>
                            </div>
                            <div class="tab_div">
                                <p>Live Auction</p>
                            </div>
                            <div class="tab_div">
                                <p>Upcomming Auctions</p>
                            </div>
                            <div class="tab_div">
                                <p>Ended Auctions</p>
                            </div>
                            <!-- Tabs Content -->
                        </div>
                        <!-- Tabs -->
                    </div>
                </div>
            </div>
            <!-- Upcomming changes section tabs div -->

            <!-- Upcomming changes section products -->

            <div class="tab-views">
                <div class="tab-view">
                    <div class="row pb-5 mt-5 p-2">
                        <?php if ($allAuctionData) : ?>
                        <?php foreach ($allAuctionData as $ad) : ?>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">
                                <img src="./media/img/product/<?php echo $ad["product_img"] ?>" alt=""
                                    class="img-fluid">
                                <div class="Auction_products_content mt-3">
                                    <h2><?php echo $ad["product_name"] ?></h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo getAuctionParticipants($ad["id"], $ad["capacity"]) ?>%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo getAuctionParticipants($ad["id"], $ad["capacity"]) ?>%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                        <!-- Store price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Store price</p>
                                            <h3><?php echo $ad["store_price"] ?></h3>
                                        </div>
                                        <!-- Start Price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Starting price</p>
                                            <h3><?php echo $ad["starting_price"] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Auction Price div -->

                                    <!-- Subcribe button -->
                                    <div class="mt-4 mb-5">
                                        <a href="./registerAuction.php?auction_id=<?php echo $ad["id"] ?>&token=<?php echo $ad["token"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $ad["starting_price"] ?></a>
                                    </div>
                                    <!-- Subcribe button -->

                                    <!-- Shecdule time div -->
                                    <div class="Shedule_div py-2">
                                        <h3 class="text-white mb-3"> Scheduled on <?php echo $ad["date"] ?>
                                            <?php echo $ad["time"] ?> </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="mt-2 mb-5 d-flex justify-content-center">
                                    <h1>No auction to show here</h1>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Popular cards -->
                    </div>

                </div>
                <div class="tab-view" style="display: none">
                    <div class="row pb-5 mt-5 p-2">
                        <?php if ($liveAuction) : ?>
                        <?php foreach ($liveAuction as $live) : ?>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">

                                <!-- Auction Products badge-->
                                <div class="Auction_products_badge">
                                    <p class="text-white">Trend</p>
                                </div>
                                <!-- Auction Products badge-->

                                <!-- Products Images -->
                                <img src="./media/img/product/<?php echo $liveAuction["product_img"] ?>"
                                    alt="<?php echo $liveAuction["product_name"] ?>" class="img-fluid">
                                <!-- Products Images -->
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2><?php echo $live["product_name"] ?></h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo getAuctionParticipants($live['id'], $live['capacity']) ?>%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo getAuctionParticipants($live['id'], $live['capacity']) ?>%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                        <!-- Store price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Store price</p>
                                            <h3><?php echo $live["store_price"] ?></h3>
                                        </div>
                                        <!-- Start Price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Starting price</p>
                                            <h3><?php echo $live["starting_price"] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Auction Price div -->

                                    <!-- Subcribe button -->
                                    <div class="mt-4 mb-5">
                                        <?php if (isset($_SESSION["email"])) : ?>
                                        <?php if (isParticepeted($_SESSION["email"], $live["id"])) : ?>
                                        <a href="./auctionpage.php?token=<?php echo $live["token"] ?>"
                                            class="Subcribe_button">Participate</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Subcribe button -->

                                    <!-- Shecdule time div -->
                                    <div class="Shedule_div py-2">
                                        <h3 class="text-white mb-3"> Scheduled on <?php echo $live["date"] ?>
                                            <?php echo $live["time"] ?> </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <?php endforeach; ?>
                        <?php if ($liveAuctionPaginationData["nextPage"]) : ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="mt-2 mb-5 d-flex justify-content-center ">
                                    <a href="./currentAuctions.php" class="Subcribe_button">See more</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php else : ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="mt-2 mb-5 d-flex justify-content-center">
                                    <h1>No auction currently going</h1>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Popular cards -->
                    </div>
                </div>
                <div class="tab-view" style="display: none">
                    <?php if ($upcomingAuction) : ?>
                    <div class="row pb-5 mt-5 p-2">
                        <?php foreach ($upcomingAuction as $upcoming) : ?>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <!-- Popular cards -->
                            <div class="popular_auction_card_div text-center py-3">
                                <!-- Auction Products badge-->

                                <!-- Products Images -->
                                <img src="./media/img/product/<?php echo $upcoming["product_img"] ?>" alt=""
                                    class="img-fluid">
                                <!-- Products Images -->
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2><?php echo $upcoming["product_name"] ?></h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo getAuctionParticipants($upcoming["id"], $upcoming["capacity"]) ?>%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo getAuctionParticipants($upcoming["id"], $upcoming["capacity"]) ?>%
                                        </div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                        <!-- Store price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Store price</p>
                                            <h3><?php echo $upcoming["store_price"] ?></h3>
                                        </div>
                                        <!-- Start Price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Starting price</p>
                                            <h3><?php echo $upcoming["starting_price"] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Auction Price div -->

                                    <!-- Subcribe button -->
                                    <div class="mt-4 mb-5">
                                        <?php if (isset($_SESSION["email"])) : ?>
                                        <?php if (!isAuctionStarted($upcoming["date"], $upcoming["time"], $upcoming["end_time"]) && !isParticepeted($_SESSION["email"], $upcoming["id"])) : ?>
                                        <?php if (!isParticepeted($_SESSION["email"], $upcoming["id"])) : ?>
                                        <a href="./registerAuction.php?auction_id=<?php echo $upcoming["id"] ?>&token_value=<?php echo $upcoming["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $upcoming["starting_price"] ?></a>
                                        <?php else :  ?>
                                        <button type="button" class="btn btn-primary" disabled>Subscribed</button>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <a href="./auctionpage.php?token=<?php echo $upcoming["token"] ?>"
                                            class="Subcribe_button">Participate</a>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <a href="./registerAuction.php?auciton_id=<?php echo $upcoming["id"] ?>&token_value=<?php echo $upcoming["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $upcoming["starting_price"] ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Subcribe button -->

                                    <!-- Shecdule time div -->
                                    <div class="Shedule_div py-2">
                                        <h3 class="text-white mb-3"> Scheduled on <?php echo $upcoming["date"] ?>
                                            <?php echo $upcoming["time"] ?> </h3>
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
                    <?php if ($upcomingAuctionPaginationData["nextPage"]) : ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="mt-2 mb-5 d-flex justify-content-center ">
                                <a href="./auction.php?category=upcoming_auction" class="Subcribe_button">See more</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php else : ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="mt-2 mb-5 d-flex justify-content-center ">
                                <h1>No Upcomming auctions yet</h1>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="tab-view" style="display: none">
                    <?php if ($completedAuctions) : ?>
                    <div class="row pb-5 mt-5 p-2">
                        <?php foreach ($completedAuctions as $completedAuction) : ?>
                        <div
                            class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                            <!-- Products Cards -->
                            <div class="Auctions_products_cards text-center p-3">
                                <!-- Products Images -->
                                <img src="./media/img/product/<?php echo $completedAuction["product_img"] ?>"
                                    alt="<?php echo $completedAuction["product_name"] ?>" class="img-fluid my-4" />
                                <!-- Products Images -->

                                <!-- content -->
                                <div class="Auction_Products_Cards_content">
                                    <h3><?php echo $completedAuction["product_name"] ?></h3>
                                    <h5 style="color: lightseagreen">Won by
                                        <?php echo getAuctionWinner($completedAuction["id"])["username"] ?></h5>

                                    <!-- Instead price -->
                                    <div
                                        class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                                        <h3 class="me-2">instead of
                                            <strike>$<?php echo $completedAuction["store_price"] ?></strike>
                                        </h3>
                                        <h4>$<?php echo $completedAuction["starting_price"] ?></h4>
                                    </div>
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
                        <!-- Popular cards -->
                    </div>
                    <?php if ($completedAuctionsPaginationData["nextPage"]) : ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="mt-2 mb-5 d-flex justify-content-center ">
                                <button class="Subcribe_button">See more</button>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php else : ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="mt-2 mb-5 d-flex justify-content-center ">
                                <h1>No Auctions ended yet</h1>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
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
                        <?php foreach ($featuredAuction as $f) : ?>
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
                                    <img src="./media/img/product/<?php echo $f["product_img"] ?>" alt=""
                                        class="img-fluid">
                                    <!-- Products Images -->
                                </div>
                                <!-- Products Content -->
                                <div class="Auction_products_content mt-3">
                                    <h2><?php echo $f["product_name"] ?></h2>
                                    <p class="my-3 light_para">Auction house filled at:</p>

                                    <!-- Product Input Progress bar -->
                                    <div class="progress auction_progress_bar mt-2 mb-4">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo getAuctionParticipants($f["id"], $f["capacity"]) ?>%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo getAuctionParticipants($f["id"], $f["capacity"]) ?>%</div>
                                    </div>
                                    <!-- Product Input Progress bar -->

                                    <!-- Auction Price div -->
                                    <div
                                        class="auction_price_div py-2 d-flex justify-content-around align-items-center">
                                        <!-- Store price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Store price</p>
                                            <h3><?php echo $f["store_price"] ?></h3>
                                        </div>
                                        <!-- Start Price -->
                                        <div class="auction_price_inner_div">
                                            <p class="light_para">Starting price</p>
                                            <h3><?php echo $f["starting_price"] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Auction Price div -->

                                    <!-- Subcribe button -->
                                    <div class="mt-4 mb-5">
                                        <?php if (isset($_SESSION["email"])) : ?>
                                        <?php if (!isAuctionStarted($f["date"], $f["time"], $f["end_time"])) : ?>
                                        <?php if (!isParticepeted($_SESSION["email"], $f["id"])) : ?>
                                        <a href="./registerAuction.php?auction_id=<?php echo $f["id"] ?>&token_value=<?php echo $f["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $f["starting_price"] ?></a>
                                        <?php else :  ?>
                                        <button type="button" class="btn btn-primary" disabled>Subscribed</button>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <?php if (isParticepeted($_SESSION["email"], $f["id"])) : ?>
                                        <a href="./auctionpage.php?token=<?php echo $f["token"] ?>"
                                            class="Subcribe_button">Participate</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <a href="./registerAuction.php?auciton_id=<?php echo $f["id"] ?>&token_value=<?php echo $f["starting_price"] ?>"
                                            class="Subcribe_button">Subscribe for
                                            <?php echo $f["starting_price"] ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Subcribe button -->

                                    <!-- Shecdule time div -->
                                    <div class="Shedule_div py-2">
                                        <h3 class="text-white mb-3"> Scheduled on <?php echo $f["date"] ?>
                                            <?php echo $f["time"] ?> </h3>
                                    </div>
                                    <!-- Shecdule time div -->
                                </div>
                                <!-- Products Content -->
                            </div>
                            <!-- Popular cards -->
                        </div>
                        <?php endforeach; ?>
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
                        <h1 class="white_heading">OUR PRICING <span class="span_color_2">PLANS</span></h1>
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
                <div class="col-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 20px">
                    <div class="price_plan_card_inner_div">

                        <div class="price_plan_heading activeBar_plan text-center">
                            <h1 class="my-4"><?php echo $p["clicks"] ?> CLICK PACK</h1>
                        </div>

                        <div class="price_plan_heading_content px-4 py-3 text-center">
                            <p class="light_para my-4">The pack allows you to<br> have <?php echo $p["clicks"] ?>
                                aditional clicks<br> to
                                bid.</p>

                            <h2 class="Price_Dolar "><span>$</span><?php echo $p["price"] ?></h2>

                            <a href="./checkout.php?package_id=<?php echo $p["id"] ?>" class="View_More_Button my-3">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if ($packagePaginationData["nextPage"]) : ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="mt-2 mb-5 d-flex justify-content-center ">
                            <a href="./Buy_token.php" class="Subcribe_button">See more</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Price div cards -->
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
                <a href="./register.php" class="Register_Button">Register</a>
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

</main>
<!-- Main -->

<!-- Footer -->
<?php require_once "./footer2.php" ?>