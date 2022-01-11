<?php
require_once "./session.php";
require_once "./model/package.php";

$package = new Package();
$packages = $package->read();
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<!-- Main -->
<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">BUY <span>TOKENS</span></h1>
    </section>
    <!-- Banner section -->

    <!-- Buy Tokens main Heading -->

    <!-- <section class="buy_tokens_main_heading padding_one">
            <div class="container-fluid side_padding">
                <div class="row">
                    <div class="col-12 text-center py-3">
                        <h1>BUY <span class="span_color_2">TOKENS</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
        </section> -->

    <!-- Buy Tokens main Heading -->

    <!-- Les Jetons ZId -->

    <section class="les_jetons_zid padding_one">
        <div class="container-fluid side_padding">
            <div class="row">
                <div class="col-12">
                    <h2 class="les_jetons_zid_heading text-center py-4 text-white">SMART AUCTION TOKENS</h2>
                    <div class="row">
                        <div class="col-10 m-auto">
                            <p class="text-center buy_tokens_para mt-2">
                                Smart-Auction Tokens are clicks you use to outbid standard auctions Please note
                                that Standard Tokens are only valid for
                                standard auctions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 zid_clicks mt-5">
                    <div class="row">
                        <?php foreach ($packages as $p) : ?>
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="zid_click_card mx-2">
                                <div class="zid_click_card_head text-center py-4">
                                    <h4 class="mb-0 text-white"><?php echo $p["clicks"] ?> CLICK PACK</h4>
                                </div>
                                <div class="zid_click_card_body text-center py-4">
                                    <p class="click_card_content text-center light_para px-5">The pack allows
                                        you to have <?php echo $p["clicks"] ?> aditional clicks to bid.</p>
                                    <h2 class="click_card_price text-center"><sup>$</sup><?php echo $p["price"] ?></h2>
                                    <a role="button" href="./checkout.php?package_id=<?php echo $p["id"] ?>"
                                        class="View_More_Button my-3">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-12 section_divider mt-5 mb-5"></div>
            </div>
        </div>
    </section>

    <!-- Les Jetons ZId -->

    <!-- Les  jetons Vip -->

    <section class="les_jetons_vip mb-5">
        <div class="container-fluid side_padding">
            <div class="row">
                <div class="col-12 mt-5">
                    <h2 class="les_jetons_vip_heading text-center py-4 text-white">SMART AUCTION TOKENS</h2>
                    <div class="row">
                        <div class="col-10 m-auto">
                            <p class="text-center buy_tokens_para mt-2">
                                VIP Tokens are clicks you use to outbid during VIP auctions Please note that VIP
                                Tokens are only valid for VIP auctions
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 vip_clicks mt-5">
                    <div class="row">
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="vip_click_card mx-2">
                                <div class="vip_click_card_head text-center py-4">
                                    <img src="./assests/icons&images/vip.png" alt="" class="vip_logo_img mb-3" />
                                    <h4 class="mb-0 text-white">10 CLICK PACK</h4>
                                </div>
                                <div class="vip_click_card_body text-center py-4">
                                    <p class="click_card_content text-center light_para px-5">The pack allows
                                        you to have 10 aditional clicks to bid.</p>
                                    <h2 class="click_card_price text-center">15<sup>$</sup></h2>
                                    <button class="View_More_Button my-3">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="vip_click_card mx-2">
                                <div class="vip_click_card_head text-center py-4">
                                    <img src="./assests/icons&images/vip.png" alt="" class="vip_logo_img mb-3" />
                                    <h4 class="mb-0 text-white">15 CLICK PACK</h4>
                                </div>
                                <div class="vip_click_card_body text-center py-4">
                                    <p class="click_card_content text-center light_para px-5">The pack allows
                                        you to have 10 aditional clicks to bid.</p>
                                    <h2 class="click_card_price text-center">19<sup>$</sup></h2>
                                    <button class="View_More_Button my-3">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 mb-sm-5">
                            <div class="vip_click_card mx-2">
                                <div class="vip_click_card_head text-center py-4">
                                    <img src="./assests/icons&images/vip.png" alt="" class="vip_logo_img mb-3" />
                                    <h4 class="mb-0 text-white">20 CLICK PACK</h4>
                                </div>
                                <div class="vip_click_card_body text-center py-4">
                                    <p class="click_card_content text-center light_para px-5">The pack allows
                                        you to have 10 aditional clicks to bid.</p>
                                    <h2 class="click_card_price text-center">25<sup>$</sup></h2>
                                    <button class="View_More_Button my-3">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="vip_click_card mx-2">
                                <div class="vip_click_card_head text-center py-4">
                                    <img src="./assests/icons&images/vip.png" alt="" class="vip_logo_img mb-3" />
                                    <h4 class="mb-0 text-white">25 CLICK PACK</h4>
                                </div>
                                <div class="vip_click_card_body text-center py-4">
                                    <p class="click_card_content text-center light_para px-5">The pack allows
                                        you to have 10 aditional clicks to bid.</p>
                                    <h2 class="click_card_price text-center">35<sup>$</sup></h2>
                                    <button class="View_More_Button my-3">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Les Jetons Vip -->

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
<!-- Main -->

<!-- Footer -->
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

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>