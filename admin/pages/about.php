<?php 
    include_once("../inc/config.php");
    $pageName="About Section";
    
    if(!isset($_SESSION['adminUser'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    if(isset($_POST['submit-up'])){
        $title=mysqli_real_escape_string($conn,ak_secure_string($_POST['title']));
        $desc=htmlspecialchars($_POST['desc']);
        $query="UPDATE `".$tblPrefix."cms_pages` SET `title`='$title',`desc`='$desc',`date_time`='$cTime' WHERE type=2";
        if(mysqli_query($conn,$query)==true){
            echo $query;
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Successfully Done";
            header("location:about.php");
            exit();
        }else{
            $_SESSION['toast']['type']="error";
            $_SESSION['toast']['msg']="Something Went Wrong";
        }
    }
    if(isset($_POST['submit-down'])){
        $html=mysqli_real_escape_string($conn,ak_secure_string($_POST['html']));
        $css=mysqli_real_escape_string($conn,ak_secure_string($_POST['css']));
        $bootstrap=mysqli_real_escape_string($conn,ak_secure_string($_POST['bootstrap']));
        $php=mysqli_real_escape_string($conn,ak_secure_string($_POST['php']));

        $socialArr = array('html'=> $html, 'css'=> $css, 'bootstrap' => $bootstrap,'php' => $php);

        $actionQ = "";
        foreach($socialArr as $key => $value){
            $actionQ .= "UPDATE `".$tblPrefix."general` SET key_value = '$value' WHERE key_name = '$key'; ";
            $_SESSION['general'][$key] = $value;
        }
        if(mysqli_multi_query($conn,$actionQ)==true){
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Successfully Done";
            header("location:about.php");
            exit();
        }else{
            $_SESSION['toast']['type']="error";
            $_SESSION['toast']['msg']="Something Went Wrong";
        }
    }
$data=mysqli_query($conn,"SELECT * FROM `".$tblPrefix."cms_pages` WHERE `id`=7 AND `type`=2");
$dataA=mysqli_fetch_assoc($data);
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
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php");?>
            <section class="pull-up">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#line-home" role="tab" aria-controls="home" aria-selected="true">Section</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" id="profile-tab2" data-toggle="tab" href="#line-profile" role="tab" aria-controls="profile" aria-selected="false">Progress Bar</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="col-lg-12 mt-4">
                                            <form method="POST">
                                                <h3 class="card-title">About Section</h3>
                                                <div class="col-lg-12">
                                                    <textarea id="editor" class="form-control" name="desc">
                                                        <?php echo htmlspecialchars_decode($dataA['desc']);?>
                                                    </textarea>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <h3 class="card-title"> Heading</h3>
                                                     <textarea id="heading" class="form-control" name="title">
                                                         <?php echo $dataA['title'];?>
                                                     </textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success m-auto" name="submit-up">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="col-lg-12 mt-4">
                                            <form method="POST">
                                                <h3 class="card-title">Progress bar</h3>
                                                <div class="form-group col-md-3" style="float: left;">
                                                    <label for="html">Html</label>
                                                    <input type="text" class="form-control" id="html" placeholder="Html" value="<?php echo $_SESSION['general']['html'];?>" name="html">
                                                </div>
                                                <div class="form-group col-md-3"style="float: left;">
                                                    <label for="css">Css</label>
                                                    <input type="text" class="form-control" id="css" placeholder="Css" value="<?php echo $_SESSION['general']['css'];?>" name="css">
                                                </div>
                                                <div class="form-group col-md-3"style="float: left;">
                                                    <label for="bootstrap">Bootstrap</label>
                                                    <input type="text" class="form-control" id="bootstrap" placeholder="Bootstrap" value="<?php echo $_SESSION['general']['bootstrap'];?>" name="bootstrap">
                                                </div>
                                                <div class="form-group col-md-3"style="float: left;">
                                                    <label for="php">PHP</label>
                                                    <input type="text" class="form-control" id="php" placeholder="PHP" value="<?php echo $_SESSION['general']['php'];?>" name="php">
                                                </div>
                                                <button type="submit" class="btn btn-success m-auto" name="submit-down">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
</html>