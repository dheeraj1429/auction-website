<?php 
    include_once("../inc/config.php");
    $pageName="Notification";

    if(!isset($_SESSION['user'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
     $icon="bell";
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php include_once('inc/css.php');?>
    <title><?php echo $pageName ." | ". SITE_NAME?></title>
</head>
<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php');?>
    <main class="admin-main">
        <?php include_once('inc/nav.php');?>
        <section class="admin-content">
            <?php include_once("inc/breadcrum.php");?>
            <div class="container pull-up">
                <div class="row">
                    <div class="col-lg-12 m-b-30">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Notification</div>

                                <div class="card-controls">
                                    <select class="custom-select">
                                        <option value="">Everything</option>
                                        <option value="">Charges</option>
                                        <option value="">Upgrades</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" src="assets/img/logos/stripe.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Charged undefined</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">June 2, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title bg-success rounded-circle">
                                                        <i class="mdi mdi-account-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Account Upgraded</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">June 12, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title bg-danger rounded-circle">
                                                        <i class="mdi mdi-alert-circle-outline"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Support Ticket Opened</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">July 16, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title bg-success rounded-circle">
                                                        <i class="mdi mdi-check-all"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Ticket Resolved</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">July 20, 2018</div>

                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" src="assets/img/logos/stripe.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Payement Method: Stripe</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">Aug 19, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title bg-primary rounded-circle">
                                                        <i class="mdi mdi-magnet"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Join Development Group</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">Sep 25, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="badge badge-soft-danger">
                                                Account Under Review
                                            </div>
                                            <div class="ml-auto col-auto text-muted">Sep 10, 2018</div>
                                        </div>


                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title bg-info rounded-circle">
                                                        <i class="mdi mdi-buffer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Switched to Auralawgic</h6>

                                            </div>
                                            <div class="ml-auto col-auto text-muted">Oct 12, 2018</div>
                                        </div>

                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" src="assets/img/logos/mailchimp.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Opened Newsletters</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">Nov 13, 2018</div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-wrapper">
                                            <div class="">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" src="assets/img/logos/google.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="m-0">Joined atmos</h6>
                                            </div>
                                            <div class="ml-auto col-auto text-muted">Jan 5, 2017</div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
    <?php require_once("inc/modal.php");?>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
</html>