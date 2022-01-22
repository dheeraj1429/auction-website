<?php
require_once "./session.php";
require_once "./model/users.php";

if (!isset($_SESSION['email'])) {
    header("Location: ./logIn.php");
    die();
}
$users = new Users();
$pageName = "My Account";
$userData = $users->read($userEmail = $_SESSION["email"])[0];
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<!-- main -->
<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">MY <span>ACCOUNT</span></h1>
    </section>
    <!-- Banner section -->

    <!-- My Account Setting -->
    <section class="MyAccount_Section padding_one">
        <div class="container-fluid side_padding">
            <div class="row pb-5 pt-4">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <!-- My Account Setting -->
                    <div class="row">
                        <div class="col-12">
                            <div class="hot_it_works_heading py-3">
                                <h1>MY ACCOUNT <span class="span_color_2">SETTINGS</span></h1>
                                <div class="line_div ms-0 my-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- My Account Setting -->

                    <div class="row">
                        <div class="col-12 myAccountOptionNum col-sm-12 col-md-6 col-lg-6">
                            <p>Number of tokens purchased</p>
                            <input type="text" class="NumberInputDis" value="<?php echo $userData["bid_token"] ?>"
                                placeholder="<?php echo $userData["bid_token"] ?>" disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6">
                            <div class="col-12 myAccountOptionNum col-sm-12 mt-4 mt-md-0">
                                <p>Number of vip tokens purchased</p>
                                <input type="text" class="NumberInputDis" value="<?php echo $userData["vip_token"] ?>"
                                    placeholder="<?php echo $userData["vip_token"] ?>" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                            <p>Last name (*)</p>
                            <input value="<?php echo $userData["username"] ?>" type="text" placeholder="Your name"
                                disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6 mt-4 mt-md-0">
                            <div class="col-12 myAccountOption col-sm-12">
                                <p>First name (*)</p>
                                <input value="<?php echo $userData["username"] ?>" type="text" placeholder="Your name"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                            <p>pseudo</p>
                            <input type="text" value="<?php echo $userData["username"] ?>" placeholder="Your name"
                                disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6 mt-4 mt-md-0">
                            <div class="col-12 myAccountOption col-sm-12">
                                <p>E-mail (*)</p>
                                <input value="<?php echo $userData["email"] ?>" type="text"
                                    placeholder="Your email address" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                            <p>Telephone number (*)</p>
                            <input type="text" value="<?php echo $userData["contact"] ?>" placeholder="Telephone number"
                                disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6 mt-4 mt-md-0">
                            <div class="col-12 myAccountOption col-sm-12">
                                <p>Address (*)</p>
                                <input type="text" value="<?php echo $userData["address"] ?>"
                                    placeholder="<?php echo $userData["address"] ?>" disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
            </div>
        </div>
    </section>
    <!-- My Account Setting -->
</main>
<!-- main -->

<!-- Footer -->
<footer class="footer side_padding second_footer">
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