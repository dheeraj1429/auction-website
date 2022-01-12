<?php
require_once "./session.php";
require_once "./model/users.php";
require_once "./model/wallet.php";

if (!isset($_SESSION["email"])) {
  header("Location: ./logIn.php");
  die();
}

$users = new Users();
$wallet = new Wallet();
$userData = $users->getUserById($_SESSION["userId"]);
$walletData = $wallet->getDataByUserId($_SESSION["userId"]);
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">MY <span>WALLET</span></h1>
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
                            <img src="./media/img/users/<?php echo $userData["profile_img"] ?>" alt="profile-img" />
                            <?php else : ?>
                            <img src="./media/img/users/default.png" alt="profile-img" />
                            <?php endif; ?>

                            <!-- <div class="edit_option">
                  <img src="./assests/icons&images/mybit/pencil 1.png" alt="" />
                </div> -->
                        </div>

                        <div class="ms-4 mt-4 mt-mb-0">
                            <h3><?php echo $userData["username"] ?></h3>
                            <p><?php echo $userData["email"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My BET -->

    <section class="wallet main_bg pb-5">
        <div class="container">
            <div class="row">
                <!-- My Wallet Desing -->
                <div class="row  justify-content-center">

                    <div class="col-12">
                        <div class="d-flex BalanceDiv justify-content-between align-items-center">
                            <h1>Total Tokens</h1>
                            <p><?php echo $userData["bid_token"] ?></p>
                        </div>

                        <div class="AlTranstion mt-3">
                            <p class="light_para">Transations</p>

                            <?php foreach ($walletData as $w) : ?>
                            <div class="row transionDiv">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="transferMoney_Div upper me-3">
                                            <?php if ($w["use_type"] == "add") : ?>
                                            <i class="fas fa-plus"></i>
                                            <?php else : ?>
                                            <i class="fas fa-minus"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <?php if ($w["use_type"] == "add") : ?>
                                            <h3>Added Token</h3>
                                            <?php else : ?>
                                            <h3>Remove Token</h3>
                                            <?php endif; ?>
                                            <div class="d-flex mt-2">
                                                <!-- <p class="light_para">12/10/2022</p> -->
                                                <p class="light_para">
                                                    <?php echo date_format(date_create($w["date"]), "d/m/Y") ?></p>
                                                <p class="light_para ms-3">
                                                    <?php echo explode(":", $w["time"])[0] ?>:<?php echo explode(":", $w["time"])[1] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 transferData upperPrice col-sm-12 col-md-6 d-flex justify-content-end">
                                    <div>
                                        <h3><?php echo $w["token_value"] ?></h3>
                                        <?php if ($w["use_type"] == "add") : ?>
                                        <p class="light_para mt-1">Added</p>
                                        <?php else : ?>
                                        <p class="light_para mt-1">Removed</p>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- My Wallet Desing -->
            </div>
        </div>
    </section>
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