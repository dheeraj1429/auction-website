<?php
require_once "./model/cmsPages.php";

$cmsPages = new CmsPages();

$howItWorks = $cmsPages->getCMSByType(3);
?>
<?php require_once './header.php' ?>
<!-- Header -->

<!-- Main -->
<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">HOW IT <span>WORKS?</span></h1>
    </section>
    <!-- Banner section -->

    <!-- How to works section -->
    <section class="register_and_account_div padding_Two">
        <div class="container">
            <?php for ($i = 0; $i < count($howItWorks); $i++) : ?>
            <?php if (($i + 1) % 2 != 0) : ?>
            <div class="row justify-content-evenly">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                    <img src="./media/img/cms/<?php echo $howItWorks[$i]["img"]; ?>" alt=""
                        class="img-fluid howItWorks_image" />
                </div>
                <div class="col-1">
                    <div class="number_circle">0<?php echo $i + 1 ?></div>
                    <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 my-auto">
                    <div class="How_it_works_content">
                        <p class="howitworks_heading m-0 p-0"><?php echo $howItWorks[$i]["title"]; ?></p>
                        <p class="howitworks_para">
                            <?php echo $howItWorks[$i]["desc"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div class="row justify-content-evenly">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 order-3">
                    <img src="./media/img/cms/<?php echo $howItWorks[$i]["img"]; ?>" alt=""
                        class="img-fluid howItWorks_image" />
                </div>
                <div class="col-1 order-2">
                    <div class="number_circle">0<?php echo $i + 1 ?></div>
                    <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 my-auto order-1">
                    <div class="How_it_works_content">
                        <p class="howitworks_heading m-0 p-0"><?php echo $howItWorks[$i]["title"]; ?></p>
                        <p class="howitworks_para">
                            <?php echo $howItWorks[$i]["desc"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endfor; ?>

            <!-- Register for free start -->

            <!-- News Letter Section -->

            <section class="news_letter_sectionside_padding main_bg">
                <div class="container-fluid padding_one">
                    <div class="row gx-0">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <!-- News letter div -->
                            <div class="news_letter_inner_div">
                                <div class="row px-3 align-items-center">
                                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                        <h1>Receive our newsletter:</h1>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 my-4 my-md-0">
                                                <div class="input_group_div">
                                                    <div class="inner_input d-flex">
                                                        <input type="email" placeholder="Enter your Email">
                                                        <div class="news_icons">
                                                            <img src="./assests/icons&images/Layer 2.svg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
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

<?php require_once "./footer.php" ?>