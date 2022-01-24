<?php
require_once "./session.php";
require_once "model/cmsPages.php";

$cmsPages = new CMSPages();
$pageName = "Who We Are";
$we = explode(" ", $cmsPages->getCMSByType(4)[0]['title']);
$type5 = $cmsPages->getCMSByType(5);
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div"
        style="background-image: url('./media/img/cms/<?php echo $cmsPages->getCMSByType(4)[0]["img"] ?>')">
        <h1 class="text-white banner_heading"><?php echo $we[0] ?> <?php echo $we[1] ?>
            <span><?php echo $we[2] ?></span>
            <h1>
    </section>
    <!-- Banner section -->

    <section class="whoWeAre padding_one">
        <div class="container-fluid side_padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- My Account Setting -->
                    <div class="row">
                        <div class="col-12">
                            <div class="hot_it_works_heading py-3">
                                <h1><?php echo $we[0] ?> <?php echo $we[1] ?> <span
                                        class="span_color_2"><?php echo $we[2] ?></span> ?</h1>
                                <div class="line_div ms-0 my-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- My Account Setting -->

                    <!-- <h5>Smart Auctions is a shopping platform unlike any other ...</h5>
                    <h5 class="my-3">Smart Auctions is the best way to afford the latest smartphone thanks to an
                        auction… online!</h5>
                    <h5>We offer a large catalog of high-tech products except for one small detail: you set the purchase
                        price!</h5> -->
                    <?php for ($i = 0; $i < count($type5); $i++) ?>
                    <p class="light_para mt-3">
                        <?php echo $type5[$i - 1]["desc"] ?>
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <img src="./media/img/cms/<?php echo $type5[$i - 1]["img"] ?>" alt=""
                        class="img-fluid howItWorks_image" />
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<?php require_once "./footer2.php" ?>