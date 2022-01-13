<?php
require_once "./session.php";
require_once "./model/auction.php";

if (!isset($_GET["token"])) {
    header("Location: ./auction.php");
    die();
}
$auction = new Auction();
$auctionData = $auction->getAuctionByToken($_GET["token"]);
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<!-- <section>
      <div class="container-fluid d-flex pt-5">
        <div class="row mx-5">
          <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <img
              src="./assests/icons&images/Rectangle 1234.png"
              class="img-fluid my-3"
            />
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <img
              src="./assests/icons&images/Rectangle 1236.png"
              class="img-fluid my-3"
            />
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <img
              src="./assests/icons&images/Rectangle 1237.png"
              class="img-fluid my-3"
            />
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <img
              src="./assests/icons&images/Rectangle 1235.png"
              class="img-fluid my-3"
            />
          </div>
        </div>
      </div>
    </section> -->

<!-- Main -->
<main>
    <!---Card-->
    <section class="py-5 px-5 mb-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <img src="./media/img/product/<?php echo $auctionData["product_img"] ?>"
                        class="d-block w-75 img-fluid img_slide" alt="..." />
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6  ">
                    <h3 class="fw-bold"><?php echo $auctionData["product_name"] ?></h3>
                    <h5>Headphones </h5>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus aut officia
                            accusantium cupiditate iusto fugiat unde quod reiciendis debitis illum?</p>
                    </div>

                    <h3 class="h2">time:</h3>
                    <div class="d-flex mt-2">
                        <div>
                            <p class="h3">Store price:</p>
                            <p class="h5"><?php echo $auctionData["store_price"]; ?></p>
                        </div>
                        <div class="ms-auto">
                            <p class="h3 fw-bolder ">New price:</p>
                            <p id="new-price" class="h5">0</p>

                        </div>
                    </div>
                    <p class="h3 mt-1 ">Number of coupons</p>
                    <p class="h4 fw-light">0</p>
                    <div class="mt-3">
                        <div class="card border-0 ">
                            <h5 class="card-title  mb-1">Specification</h5>
                            <div class="card-body">
                                <h5 class="card-subtitle mb-2 ">General</h5>
                                <p> <span class="h6 ">Battery:</span> <span class="h6 px-5">99wh</span> </p>
                                <p> <span class="h6 ">Storage:</span> <span class="h6 px-5">99wh</span> </p>
                                <p> <span class="h6 ">Display:</span> <span class="h6 px-5">99wh</span> </p>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-lg rounded-pill h4 fw-bolder btn-danger buy_Button mb-5">Submit</button>
                </div>
            </div>
    </section>
    <!-- <section class="news_letter_sectionside_padding main_bg">
            <div class="container-fluid padding_one">
                <div class="row gx-0">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        News letter div 
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
                                            <button class="send_button">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- News Letter Section -->
</main>
<!-- Main -->

<!-- Footer -->
<!-- Footer -->
<footer class="footer side_padding ">
    <!-- Footer -->
    <div class="container padding_one">
        <div class="row pt-4 justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-5">
                <h1 class="text-white my-3">SMART-AUCTION</h1>
                <p class="light_para">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio
                    <br />
                    voluptatem qui magnam aliquid cum atque tempore quia? Quis,<br />
                    doloribus commodi.
                </p>

                <!-- Footer icons -->
                <!-- <div class="footer_icons">
          <i class="fab fa-facebook-f" class="img-fluid"></i>
          <i class="fab fa-instagram" class="img-fluid"></i>
          <i class="fab fa-linkedin-in" class="img-fluid"></i>
          <i class="fab fa-twitter" class="img-fluid"></i>
        </div> -->
                <!-- Footer icons -->
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
                <h1 class="text-white my-3">USEFUL LINKS</h1>
                <p class="light_para"><a href="./woWeare.html">Who are we?</a></p>
                <p class="light_para">
                    <a href="./howItWorks.html">How it works?</a>
                </p>
                <p class="light_para">
                    <a href="./terms.html">Terms and Conditions</a>
                </p>
                <p class="light_para"><a href="./legal.html">Legal</a></p>
            </div>

            <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
        <h1 class="text-white my-3">STAY IN TOUCH</h1>
        <div class="footer-icons_div d-flex align-items-center">
          <i class=" fas fa-map-marker-alt text-white" class="img-fluid"></i>
          <p class="light_para mb-0 ms-3"><a href="#">Residence les dunes tanisay, 2033 Akolk, UK City</a></p>
        </div>

        <div class="footer-icons_div my-3 d-flex align-items-center">
          <i class="fas fa-phone-alt text-white" class="img-fluid"></i>
          <p class="light_para mb-0 ms-3"><a href="#">7352-256-546-202</a></p>
        </div>

        <div class="footer-icons_div d-flex align-items-center">
          <i class="fas fa-mail-bulk text-white" class="img-fluid"></i>
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
<!-- Footer -->

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" class="img-fluid"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" class="img-fluid"></script>
</body>

</html>