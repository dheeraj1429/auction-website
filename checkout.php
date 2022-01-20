<?php
require_once "./model/package.php";
require_once "./getValuesByName.php";
require_once "./session.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}
if (!isset($_GET["package_id"])) {
    header("HTTP/1.0 404 Not Found");
    die();
}
$config = file_get_contents('config.json');
$configData = json_decode($config, true);
$package = new Package();
$packageData = $package->read($id = $_GET["package_id"]);

if (!empty($packageData)) {
    $packageData = $packageData[0];
} else {
    header("HTTP/1.0 404 Not Found");
    die();
}
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

    <link rel="stylesheet" href="./assests/style/Home.css" />
    <link rel="stylesheet" href="./assests/style/global.css" />
    <link rel="stylesheet" href="./assests/style/navbar.css" />
    <link rel="stylesheet" href="./assests/style/button.css" />
    <link rel="stylesheet" href="./assests/style/howItWorks.css" />
    <link rel="stylesheet" href="./assests/style/content.css">
    <link rel="stylesheet" href="./assests/style/footer.css" />
    <link rel="stylesheet" href="./assests/style/logIn.css" />
    <link rel="stylesheet" href="./assests/style/userProfile.css" />
    <link rel="stylesheet" href="./assests/style/blog.css" />
    <link rel="stylesheet" href="./assests/style/MyAccount.css" />
    <link rel="stylesheet" href="./assests/style/buy_token.css" />
    <link rel="stylesheet" href="./assests/style/checkout.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="icon" href="<?php echo "./media/" . getValuesByName("favicon") ?>">
    <script>
    const userId = <?php echo $_SESSION["userId"] ?>;
    const packageId = <?php echo $_GET["package_id"] ?>;
    const price = <?php echo $packageData["price"] ?>
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $configData["client_id"] ?>&components=buttons">
    </script>
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
                        <a class="navbar-brand" href="./index.php">
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
                                    <a class="nav-link active" aria-current="page" href="./">HOME</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="./howItWorks.php">HOW IT
                                        WORKS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./Ended.php">ENDED AUCTIONS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./currentAuctions.php">CURRENT
                                        AUCTION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="Buy_token.php">BUY TOKENS</a>
                                </li>



                                <?php if (isset($_SESSION["email"])) : ?>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle drop" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            AALBOUCHI
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="./MyAccount.php">My Account</a></li>
                                            <li><a class="dropdown-item" href="./signout.php">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php else : ?>
                                <div class="sign_in_button d-flex align-items-center ms-5">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="./logIn.php">SIGN IN</a>
                                    </li>
                                    <a href="./register.php" class="Subcribe_button_sm text-white">REGISTER</a>
                                </div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Main-Navbar -->
    </header>
    <div class="container" style="width: 100vw;height: 60vh;">
        <div class="center">
            <div class="card"
                style="padding: 15px; width: 60%; margin: 10px;box-shadow: 0px 4px 40px rgba(0, 0, 0, 0.25);">
                <h2 class="card-title"><?php echo $packageData["clicks"] ?> CLICK PACK</h2>
                <p class="card-text">The pack allows you to
                    have <?php echo $packageData["clicks"] ?> aditional clicks
                    to bid.</p>
                <h4>Price: $<?php echo $packageData["price"] ?></h4>
                <div class="btn-container">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assests/js/paypal.js"></script>
    <?php require_once "./footer2.php" ?>