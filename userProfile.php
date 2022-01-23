<?php
require_once "session.php";
require_once "model/users.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}

$users = new Users();
$pageName = "Profile page";
$userData = $users->read($userEmail = $_SESSION["email"])[0];
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
                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/mybit/image 20.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 57.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 58.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 67.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
                            </div>
                            <!-- Subcribe button -->
                            <!-- <div class="mt-4 mb-5 d-flex">
                  <button class="Subcribe_button">Subscribe for $15</button>
                  <button class="Subcribe_button_sm text-white">Submit A Bid</button>
                </div> -->
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
            </div>

            <div class="row justify-content-center pb-5 p-2">
                <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3">
                    <!-- Popular cards -->
                    <div class="popular_auction_card_div text-center py-3">
                        <!-- Auction Products badge-->
                        <div class="Auction_products_badge">
                            <p class="text-white">Trend</p>
                        </div>
                        <!-- Auction Products badge-->

                        <!-- Products Images -->
                        <img src="./assests/icons&images/mybit/image 68.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 69.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 70.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
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
                        <img src="./assests/icons&images/mybit/image 71.png" alt="" class="img-fluid" />
                        <!-- Products Images -->
                        <!-- Products Content -->
                        <div class="Auction_products_content mt-3">
                            <h2>Apple Cinema 30"</h2>
                            <p class="my-3 light_para">Auction house filled at:</p>

                            <!-- Product Input Progress bar -->
                            <div class="progress auction_progress_bar mt-2 mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
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
                                <button class="Subcribe_button">VIEW DETAILS</button>
                            </div>
                            <!-- Subcribe button -->
                            <!-- <div class="mt-4 mb-5 d-flex">
                  <button class="Subcribe_button">Subscribe for $15</button>
                  <button class="Subcribe_button_sm text-white">Submit A Bid</button>
                </div> -->
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
<footer class="footer side_padding">
    <!-- Footer -->
    <div class="container padding_one">
        <div class="row pt-4 justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-5">
                <h1 class="text-white my-3">SMART-AUCTION</h1>
                <p class="light_para">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio <br />
                    voluptatem qui magnam aliquid cum atque tempore quia? Quis,<br />
                    doloribus commodi.
                </p>

                <!-- Footer icons -->
                <!-- <div class="footer_icons">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-linkedin-in"></i>
          <i class="fab fa-twitter"></i>
        </div> -->
                <!-- Footer icons -->
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
                <h1 class="text-white my-3">USEFUL LINKS</h1>
                <p class="light_para"><a href="./woWeare.html">Who are we?</a></p>
                <p class="light_para"><a href="./howItWorks.html">How it works?</a></p>
                <p class="light_para"><a href="./terms.html">Terms and Conditions</a></p>
                <p class="light_para"><a href="./legal.html">Legal</a></p>
            </div>

            <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
        <h1 class="text-white my-3">STAY IN TOUCH</h1>
        <div class="footer-icons_div d-flex align-items-center">
          <i class=" fas fa-map-marker-alt text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">Residence les dunes tanisay, 2033 Akolk, UK City</a></p>
        </div>

        <div class="footer-icons_div my-3 d-flex align-items-center">
          <i class="fas fa-phone-alt text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">7352-256-546-202</a></p>
        </div>

        <div class="footer-icons_div d-flex align-items-center">
          <i class="fas fa-mail-bulk text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">contact@gami.com</a></p>
        </div>


      </div> -->

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
                <h1 class="text-white my-3">NEWSLETTER</h1>
                <!-- <p class="light_para">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->

                <!-- News letter section -->
                <div class="newsLetter_search">
                    <input type="search" placeholder="Enter your email" />
                    <div class="newlettButton">SUBSCRIBE</div>
                </div>
                <!-- News letter section -->

                <!-- <p class="light_para"><a href="#">Payment Methods</a></p>
        <p class="light_para"><a href="#">Money-back gurantee</a></p>
        <p class="light_para"><a href="#">Return</a></p>
        <p class="light_para"><a href="#">Shipping</a></p>
        <p class="light_para"><a href="#">Terms and conditions</a></p>
        <p class="light_para"><a href="#">Privacy Prolicy</a></p> -->
            </div>
        </div>
    </div>
    <!-- Footer -->

    <!-- Footer Second -->
    <div class="container-fluid footer_second">
        <div class="row">
            <div class="d-flex justify-content-around py-3">
                <p class="light_para">Copyright © 2021. All Rights Reserved.</p>
                <p class="light_para">
                    <a href="./terms.html"> Terms of Use </a> and
                    <a href="./policy.html"> Privacy Policy </a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer Second -->
</footer>
<!-- Footer -->

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>