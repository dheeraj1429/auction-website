<?php 
    include_once("../inc/config.php");
    $pageName="Sharing is Caring";

    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
     $icon="share";
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php include_once('inc/css.php');?>
    <title><?php echo $pageName ." | ". SITE_NAME?></title>
    <style type="text/css">
        
.social-container {
  width: 400px;
  margin: 0 auto;
  text-align: center;
}

.social-icons {
  padding: 0;
  list-style: none;
  margin: 1em;
}
.social-icons li {
  display: inline-block;
  margin: 0.15em;
  position: relative;
  font-size: 1.2em;
}
.social-icons i {
    font-size: 30px;
  color: #fff;
  position: absolute;
  top: 7px;
  left: 16px;
  transition: all 265ms ease-out;
}
.social-icons a {
  display: inline-block;
}
.social-icons a:before {
  transform: scale(1);
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  content: " ";
  width: 60px;
  height: 60px;
  border-radius: 100%;
  display: block;
  transition: all 265ms ease-out;
}
.social-icons .fb a:before {
    background:  #3b5998;
}
.social-icons .tw a:before {
    background:  #00acee;
}
.social-icons .li a:before {
    background:  #0e76a8;
}
.social-icons .wa a:before {
    background:  #25d366;
}
.social-icons .pc a:before {
    background:  #111a36;
}
.social-icons a:hover:before {
  transform: scale(0);
  transition: all 265ms ease-in;
}
.social-icons a:hover i {
  transform: scale(2.2);
  -ms-transform: scale(2.2);
  -webkit-transform: scale(2.2);
  color: #ff003c;
  background: -webkit-linear-gradient(45deg, #ff003c, #c648c8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: all 265ms ease-in;
}
.social-icons a.social-square:before {
  border-radius: 10%;
}
.social-icons a.social-square:hover:before {
  transform: rotate(-180deg);
  -ms-transform: rotate(-180deg);
  -webkit-transform: scale(-180deg);
  border-radius: 100%;
}
.social-icons a.social-square:hover i {
  transform: scale(1.1);
  -ms-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  color: #fff;
  transform: scale(1.1);
  -webkit-text-fill-color: #fff;
}

    </style>
</head>
<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php');?>
    <main class="admin-main">
        <?php include_once('inc/nav.php');?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php");?>
                <div class="container pull-up">
                <div class="row ">
                    <div class="col-lg-8 mx-auto mt-2">
                        <div class="card m-b-30">
                            <div class="card-header text-center">
                                <h3 class="m-b-0">
                                     Share Us On
                                </h3>
                            </div>
                            <div class="card-body ">
                                <div class="social-container">
                                    <ul class="social-icons">
                                        <li class="fb">
                                            <a href="#" class="social-square " data-toggle="tooltip" data-placement="top" title="Share on Facebook"><i class="mdi mdi-facebook "></i></a>
                                        </li>
                                        <li class="tw">
                                            <a href="#" class="social-square "data-toggle="tooltip" data-placement="top" title="Share on Twitter"><i class="mdi mdi-twitter "></i></a>
                                        </li>
                                        <li class="li">
                                            <a href="#" class="social-square " data-toggle="tooltip" data-placement="top" title="Share on Linkedin"><i class="mdi mdi-linkedin li" ></i></a>
                                        </li>
                                        <li class="wa">
                                            <a href="#" class="social-square "data-toggle="tooltip" data-placement="top" title="Share on Whatsapp"><i class="mdi mdi-whatsapp " ></i></a>
                                        </li>
                                        <li class="pc">
                                            <a href="#" class="social-square" data-toggle="tooltip" data-placement="top" title="Copy To Clipboard"><i class="mdi mdi-paperclip " ></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once("inc/modal.php");?>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
</body>
</html>