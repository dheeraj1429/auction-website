<?php 
    include_once("../inc/config.php");
    $pageName="General Details";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
// Home Page Meta Tags
	if(isset($_POST['submit-home'])){
		$page=mysqli_real_escape_string($conn,ak_secure_string($_POST['page']));
		$title=mysqli_real_escape_string($conn,ak_secure_string($_POST['title']));
		$keyword=mysqli_real_escape_string($conn,ak_secure_string($_POST['keyword']));
		$desc=mysqli_real_escape_string($conn,ak_secure_string($_POST['desc']));
		$query="UPDATE `".$tblPrefix."meta_tags` SET `title`='$title',`keyword`='$keyword',`description`='$desc',`date_time`='$cTime' WHERE `page`='$page'";
		if(mysqli_query($conn,$query)==true){
            $_SESSION['meta']['title']=$title;
            $_SESSION['meta']['keyword']=$keyword;
            $_SESSION['meta']['description']=$desc;
			$_SESSION['toast']['type']="success";
			$_SESSION['toast']['msg']="Succefully Updated";
			header("location:meta.php");
			exit();
		}else{
			$_SESSION['toast']['type']="error";
			$_SESSION['toast']['msg']="Something went wrong, Please try again.";
		}
	}

	// Blog Page Meta Tags
	if(isset($_POST['submit-blog'])){
		$page=2;
		$title=mysqli_real_escape_string($conn,ak_secure_string($_POST['title']));
		$keyword=mysqli_real_escape_string($conn,ak_secure_string($_POST['keyword']));
		$desc=mysqli_real_escape_string($conn,ak_secure_string($_POST['desc']));
		$query="UPDATE `".$tblPrefix."meta_tags` SET `title`='$title',`keyword`='$keyword',`description`='$desc',`date_time`='$cTime' WHERE `page`='2'";
		if(mysqli_query($conn,$query)==true){
            echo mysqli_error($conn);
			$_SESSION['toast']['type']="success";
			$_SESSION['toast']['msg']="Succefully Updated";
			header("location:meta.php");
			exit();
		}else{
			$_SESSION['toast']['type']="error";
			$_SESSION['toast']['msg']="Something went wrong, Please try again.";
		}
	}
// Home meta Details
$dataHome=mysqli_query($conn,"SELECT `title`,`keyword`,`description` FROM `".$tblPrefix."meta_tags` WHERE page=1");
$dataH=mysqli_fetch_assoc($dataHome);
// Blog meta Details
$dataBlog=mysqli_query($conn,"SELECT `title`,`keyword`,`description` FROM `".$tblPrefix."meta_tags` WHERE page=2");
$dataB=mysqli_fetch_assoc($dataBlog);
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
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#line-home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" id="profile-tab2" data-toggle="tab" href="#line-profile" role="tab" aria-controls="profile" aria-selected="false">Blog</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="POST" class="mt-3">
                                        	<input type="hidden" name="page" value="1">
                                        	<div class="form-group col-md-12">
                                                <label for="head">Meta Title</label>
                                                <input type="text" class="form-control" id="head" placeholder="Meta Title" value="<?php echo $dataH['title'];?>" name="title" autocomplete="OFF" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Meta Keyword</label>
                                                <input type="text" class="form-control" id="head" placeholder="Meta Keyword" value="<?php echo $dataH['keyword'];?>" name="keyword" autocomplete="OFF" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Meta Description</label>
                                                <textarea class="form-control" aria-label="Meta Description" name="desc"> <?php echo $dataH['description'];?> </textarea>  
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success m-auto" name="submit-home">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="profile-tab">
                                    	<form method="POST"  class="mt-3">
                                        	<input type="hidden" name="page" value="2">
                                        	<div class="form-group col-md-12">
                                                <label for="head">Meta Title</label>
                                                <input type="text" class="form-control" id="head" placeholder="Meta Title" value="<?php echo $dataB['title'];?>" name="title" autocomplete="OFF" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Meta Keyword</label>
                                                <input type="text" class="form-control" id="head" placeholder="Meta Keyword" value="<?php echo $dataB['keyword'];?>" name="keyword" autocomplete="OFF" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Meta Description</label>
                                                <textarea class="form-control" aria-label="Meta Description"  name="desc"> <?php echo $dataB['description'];?></textarea>  
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success m-auto" name="submit-blog">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
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