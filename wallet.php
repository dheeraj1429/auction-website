<?php
require_once "./session.php";
require_once "./model/users.php";
require_once "./functions.php";
require_once "./model/wallet.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}

$pageName = "wallet";
$users = new Users();
$wallet = new Wallet();
$pageNo = 1;

if (isset($_GET["page"])) {
    $pageNo = $_GET["page"];
}

$userData = $users->getUserById($_SESSION["userId"]);
$paginationData = pagination($wallet->read($_SESSION["userId"]), $pageNo, 8);
$walletData = $paginationData["data"];
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
                        <div class="row padding_one">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <!-- pagination -->
                                <div class="d-flex">
                                    <?php if ($paginationData["previousPage"]) : ?>
                                    <a href="./wallet.php?page=<?php echo $paginationData["previousPage"]; ?>">
                                        <div class="pagiantion_div">
                                            <img class="rotate180" src="./assests/icons&images/Vector (3).svg" alt="">
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php for ($i = 0; $i < $paginationData["paginationLen"]; $i++) : ?>
                                    <?php if ($i + 1 == $pageNo) : ?>
                                    <a href="./wallet.php?page=<?php echo $i + 1 ?>">
                                        <div class="pagiantion_div activepagination">
                                            <?php echo $i + 1; ?>
                                        </div>
                                    </a>
                                    <?php else : ?>
                                    <a href="./wallet.php?page=<?php echo $i + 1 ?>">
                                        <div class="pagiantion_div">
                                            <?php echo $i + 1; ?>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php if ($paginationData["nextPage"]) : ?>
                                    <a href="./wallet.php?page=<?php echo $paginationData["nextPage"] ?>">
                                        <div class="pagiantion_div">
                                            <img src="./assests/icons&images/Vector (3).svg" alt="" />
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <!-- pagination -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Wallet Desing -->
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<?php require_once "./footer2.php" ?>