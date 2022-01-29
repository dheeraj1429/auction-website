<?php
require_once "../session.php";
$pageName = "Dashboard ";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php require_once("inc/css.php"); ?>
    <title>Smart Auction</title>
</head>

<body class="sidebar-pinned">
    <?php include_once("inc/sidebar.php"); ?>
    <main class="admin-main">
        <?php include_once("inc/nav.php"); ?>
        <section class="admin-content ">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-dark bg-dots m-b-30">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-12 pt-3 text-center">
                                        <h1 class="text-white"><span class="js-greeting">Good </span>,
                                            <?php echo ucfirst($_SESSION['admin_email']); ?>!</h1>
                                    </div>
                                </div>
                                <div class="row py-3 ">
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title rounded-circle"> <i
                                                        class="mdi mdi-account-multiple"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">3,500</h1>
                                        <p class="text-white opacity-75 text-overline ">total users</p>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title rounded-circle bg-soft-warning"> <i
                                                        class="mdi mdi-clipboard-check"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">48,100</h1>
                                        <p class="text-white opacity-75 text-overline ">total sessions</p>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title bg-soft-success rounded-circle"> <i
                                                        class="mdi mdi-cash-usd"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">$4600</h1>
                                        <p class="text-white opacity-75 text-overline ">total revenue</p>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title rounded-circle bg-soft-danger"> <i
                                                        class="mdi mdi-alert-octagram"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">50</h1>
                                        <p class="text-white opacity-75 text-overline ">new tickets</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header ">
                                <h5 class="card-title m-t-10">Overall Performance</h5>
                                <div class="card-controls">
                                    <a href="#" class="js-card-refresh icon"></a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon mdi mdi-dots-vertical"></i> </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart-04"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once("inc/modal.php"); ?>
    <?php require_once("inc/js.php"); ?>
    <?php require_once("inc/search-bar.php"); ?>
</body>

</html>