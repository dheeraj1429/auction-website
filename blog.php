<?php
require_once "./session.php";
require_once "./model/blog.php";

if (!isset($_GET["id"])) {
   header("Location: index.php");
}
$blog = new Blog();
$blogData = $blog->read($id = $_GET["id"])[0];

?>
<?php require_once "./header.php" ?>

<!-- Header -->

<!-- main -->
<main>
    <!-- blog head -->
    <section class="blog_banner_section padding_one main_bg">
        <div class="container-fluid side_padding">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1><?php echo $blogData["name"] ?></h1>
                </div>
                <div class="col-12 col-md-6 col-lg-6 d-flex user_icons_blog align-items-center justify-content-end">
                    <img src="./assests/icons&images/useGrop.svg" alt="" />
                    <div>
                        <p>bretskymd@gmail.com</p>
                        <p><?php echo date_format(date_create($blogData["post_date"]), "F, d Y") ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog head -->

    <section class="blogs main_bg py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="./media/img/blog/<?php echo $blogData["img"] ?>" alt="" class="img-fluid" />
                </div>
                <div class="col-12 side_padding">
                    <p class="ms-0 ms-md-3 mt-5 light_para">
                        Looking at the week over week smoothed incidence rate of COVID-19 infection in Los Angeles,
                        we are now seeing a clear upwards
                        trend in cases (Figure 1 below). Cases from 11/30/2021 to 12/.7/2021 increased from 8.9
                        cases per 100,000 population to 13.7
                        per 100,000 population.
                    </p>
                    <p class="ms-0 ms-md-0 light_para">
                        To the left of the graph is included the Delta surge as reference. Notice first that we
                        started from a much lower population
                        rate for Delta (1.8-2.3 cases per 100,000 population) as compared to today (8.9-12.1 cases
                        per 100,000 population). Current
                        upward trajectory, however, seems to be about the same as it was at the beginning of the
                        Delta surge (cases went from 3.2 to
                        5.7 to 11.4 to 18.4 to 24.0 and topped out at 32.4 – so a 10 fold increase). It is
                        reasonable to assume that we are now in the
                        midst of a combined tail-end of delta plus the beginning of Omicron in LA County.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs main_bg py-4">
        <div class="container">
            <?php echo htmlspecialchars_decode($blogData["desc"]) ?>
        </div>
    </section>
    <!-- Comments -->
    <section class="comments_section padding_one main_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 side_padding">
                    <h1>Comments</h1>
                </div>

                <div class="row side_padding pt-2 pt-md-5">
                    <div class="col-12 col-md-2">
                        <img src="./assests/icons&images/blog/Rectangle 1299.png" alt="" />
                    </div>
                    <div class="col-12 col-md-10 pt-3 pt-md-0 commentsUsers">
                        <h3>Ernest Green <span class="comment_date light_para ms-2">June 11, 2021</span></h3>
                        <p class="light_para">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure
                            dolor in reprehenderit
                        </p>

                        <button class="replay_Button">Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comments -->

    <!-- Comment box -->
    <section class="comments_box main_bg pt-5 pb-5">
        <div class="container">
            <div class="row gx-0 side_padding">
                <div class="col-12">
                    <h3>LEAVE A REPLY</h3>
                    <p class="light_para">Your email address will not be published. Required fields are marked *</p>
                </div>

                <div class="col-12 message_aria">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Comment"></textarea>
                </div>

                <div class="row gx-0 message_aria">
                    <div class="col-12 col-md-6">
                        <input type="text" placeholder="Name" />
                    </div>
                    <div class="col-12 col-md-6 ps-0 ps-md-2 mt-2 mt-md-0">
                        <input type="email" name="" id="" placeholder="Email" />
                    </div>

                    <div class="d-flex">
                        <button class="post_button mt-3">POST COMMENT</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment box -->
</main>
<!-- main -->

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