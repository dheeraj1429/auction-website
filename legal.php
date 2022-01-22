<?php
require_once "./session.php";
require_once "./getValuesByName.php";

$pageName = "legal";
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">LEGAL <span>NOTICE</span></h1>
    </section>
    <!-- Banner section -->

    <!-- Content -->
    <section class="Policy_section py-5">
        <div class="container">
            <h1 class="mb-4">PREAMBLE</h1>
            <!-- <p class="light_para mt-2">
                The services, appearing on the Internet site http://www.smartauction.com/, are offered by the company
                Global bid sarl (hereinafter
                “global bid.sarl”) which publishes this site.
            </p>
            <p class="light_para mt-2">
                On the whole of the aforementioned site that it publishes, the company Global Bid offers for sale and
                auction all kinds of products
                and services.
            </p>
            <p class="light_para mt-2">
                The auctions will take place in different rooms (each auction will be orchestrated in a room assigned to
                it).
            </p>
            <p class="light_para mt-2">
                Global Bid is a limited liability company with a capital of 10,000 dinars, whose head office is located
                at Res. Les dunes Tantana,
                Akouda, Tunisia, registered in the National Register of Companies under number 1610827Q.
            </p> -->
            <p class="light_para mt-2">
                <?php echo getValuesByName("condition") ?>
            </p>
            <p class="light_para mt-2">Telephone number: <?php echo getValuesByName("phone_number"); ?></p>
            <p class="light_para mt-2">Email address: <?php echo getValuesByName("email"); ?></p>
            <p class="light_para mt-2">Legal representative: Iheb Souilem, in his capacity as Chairman of Global bid</p>
            <p class="light_para mt-2">Responsible for publication: Iheb Souilem</p>
        </div>
    </section>
    <!-- Content -->
</main>

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

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>