<?php
   require_once 'inc/config.php';
   $pageName="Auction";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'inc/head.php';?>
    <link rel="stylesheet" href="./assests/style/auctionpage.css" />
    <link rel="stylesheet" href="./assests/style/ended.css" />
</head>

<body>
    <!-- Header -->
    <?php require_once 'inc/header.php';?>
    <!-- Header -->

    <!-- Main -->
    <main>
        <!---Card-->
        <section class="py-5 px-5 mb-5">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <img src="./assests/icons&images/image 58.png " class="d-block w-75 img-fluid img_slide"
                            alt="..." />
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6  ">
                        <h3 class="fw-bold">White Solo 2 Wireless </h3>
                        <h5>Headphones </h5>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus aut officia
                                accusantium cupiditate iusto fugiat unde quod reiciendis debitis illum?</p>
                        </div>

                        <h3 class="h2">time:</h3>
                           <div class="d-flex mt-2">
                            <div>
                                <p class="h3">Store price:</p>
                                <p class="h5">$123</p>
                            </div>
                            <div class="ms-auto">
                                <p class="h3 fw-bolder ">New price:</p>
                                <p class="h5">$111</p>

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
    <?php require_once 'inc/footer.php';?>

    <!-- Footer -->
    <!-- Footer -->

    <?php require_once 'inc/js.php';?>
</body>

</html>