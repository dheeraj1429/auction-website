<?php
require_once "./getValuesByName.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Auction</title>

    <!-- Bootstarp 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Style sheet Link -->
    <link rel="stylesheet" href="./assests/style/Home.css">
    <link rel="stylesheet" href="./assests/style/global.css">
    <link rel="stylesheet" href="./assests/style/navbar.css">
    <link rel="stylesheet" href="./assests/style/button.css">
    <link rel="stylesheet" href="./assests/style/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="icon" href="<?php echo "/media/" . getValuesByName("favicon") ?>">
</head>

<body>


    <!-- Header -->
    <header>
        <!-- Top Header -->
        <div class="Top_Header">
            <div class="Top_Header_Inner container-fluid side_padding">
                <div class="Top_Navbar_Inner_Sm_div">
                    <i class="fas fa-envelope"></i>
                    <p class="text-white"><?php echo getValuesByName("email") ?></p>
                </div>

                <!-- Top navbar icons -->
                <div class="Top_Navbar_Inner_Sm_div">
                    <a href="<?php echo getValuesByName("facebook") ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo getValuesByName("instagram") ?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?php echo getValuesByName("linkedin") ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="<?php echo getValuesByName("twitter") ?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <!-- Top navbar icons -->

            </div>
        </div>
        <!-- Top Header -->

        <!-- Main-Navbar -->
        <div class="Top_second_naber py-1">
            <div class="container-fludi side_padding">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <!-- <h1>Auction</h1> -->
                            <img width="50px" height="50px" src="<?php echo "./media/" . getValuesByName("logo") ?>"
                                alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page" href="./home.html">HOME</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="./howItWorks.php">HOW IT
                                        WORKS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">ENDED AUCTIONS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">CURRENT AUCTION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">CUY TOKENS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">ALBOCHI</a>
                                </li>


                                <div class="sign_in_button d-flex align-items-center ms-5">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">SIGN IN</a>
                                    </li>
                                    <button class="Subcribe_button_sm text-white">REGISTER</button>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Main-Navbar -->

    </header>