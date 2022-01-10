<?php 
    include_once("../inc/config.php");
    $pageName="Alternative Section";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }

    if(isset($_POST['submit'])){ 
        $head=mysqli_real_escape_string($conn,ak_secure_string($_POST['head']));
        $text=htmlspecialchars($_POST['text']);
        if(isset($_GET['id'])){
            $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
            $query="UPDATE `".$tblPrefix."cms_pages` SET `title`='$head', `desc`='$text' WHERE `id`='$id'";
        }else{
            $query="INSERT INTO `".$tblPrefix."cms_pages`(`type`, `title`, `desc`, `date_time`, `status`) VALUES (1,'$head','$text','$cTime',2)";
            $id = mysqli_insert_id($conn);
        }
        if(mysqli_query($conn,$query)==true){
            $tmpName = $_FILES['image']['tmp_name'];
            if(file_exists($tmpName)){
                $fileName = $_FILES['image']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
                    $fileName = rand(1111,9999).".".$ext;
                    if(move_uploaded_file($tmpName, '../media/img/site-img/'.$fileName)==true){
                        mysqli_query($conn, "UPDATE `".$tblPrefix."cms_pages` SET `img`='$fileName' WHERE `id`='$id'");
                        $_SESSION['toast']['type']="success";
                        $_SESSION['toast']['msg']="Successfully updated.";
                    }else{
                        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
                    }
                }else{
                        $_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                    }
            }
        }
    }

    // Update data 
    if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
        $data=mysqli_query($conn,"SELECT title,img,`desc` FROM `".$tblPrefix."cms_pages` WHERE id='$id'");
        $dataC=mysqli_fetch_assoc($data);
    }
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
                                    <h3 class="card-title text-center"><?php echo $pageName;?></h3>
                                    <div class="col-lg-12 mb-3">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <label for="head">Heading</label>
                                                <input type="text" class="form-control" id="head" placeholder="Heading" value="<?php if(isset($_GET['id'])){echo $dataC['title'];}?>" name="head" autocomplete="OFF" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="text">Text</label>
                                               <textarea id="editor" class="form-control" name="text"><?php if(isset($_GET['id'])){echo htmlspecialchars_decode($dataC['desc']);}?></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="inputllogo02" name="image">
                                                    <label class="custom-file-label" for="inputllogo02">Image</label>
                                                </div>
                                                <?php if(isset($_GET['id'])){?>
                                                    <img src="../media/img/site-img/<?php if(isset($_GET['id'])){echo $dataC['img'];}?>" class="img-circle img-responsive m-auto mx-2" alt="<?php if(isset($_GET['id'])){echo $dataC['title'];}?>" height="100px;">
                                                <?php }?>
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success m-auto" name="submit">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
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