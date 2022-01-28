<?php
require_once "./session.php";
require_once "model/cmsPages.php";

$cmsPages = new CMSPages();
$pageName = "Who We Are";
$we = $cmsPages->getCMSByType(4);
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">Who We <span class="span_color_2">Are</span> ?</span>
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
                                <h1>Who We <span class="span_color_2">Are</span> ?</h1>
                                <div class="line_div ms-0 my-4"></div>
                            </div>
                        </div>
                    </div>
                    <?php for ($i = 0; $i < count($we); $i++) : ?>
                    <p class="light_para mt-3">
                        <?php echo $we[$i]["desc"] ?>
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <img src="./media/img/cms/<?php echo $we[$i]["img"] ?>" alt="" class="img-fluid howItWorks_image" />
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<?php require_once "./footer2.php" ?>