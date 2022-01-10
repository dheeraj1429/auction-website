<?php 
    include_once("../inc/config.php");
    $pageName="Add/Edit Projects";
    
    if(!isset($_SESSION['adminUser'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    if(isset($_POST['submit'])){ 
        $head=mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
        $text=mysqli_real_escape_string($conn,ak_secure_string($_POST['link']));
        if(isset($_GET['id'])){
            $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
            $query="UPDATE `".$tblPrefix."cms_pages` SET `title`='$head', `desc`='$text' WHERE `id`='$id'";
        }else{
            $query="INSERT INTO `".$tblPrefix."cms_pages`(`type`, `title`, `desc`, `date_time`, `status`) VALUES(4,'$head','$text','$cTime',2)";
            $id = mysqli_insert_id($conn);
        }
        if(mysqli_query($conn,$query)==true){
            $tmpName = $_FILES['image']['tmp_name'];
            if(file_exists($tmpName)){
                $fileName = $_FILES['image']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
                    $fileName = rand(1111,9999).".".$ext;
                    if(move_uploaded_file($tmpName, '../media/img/projects/'.$fileName)==true){
                        $image="UPDATE `".$tblPrefix."cms_pages` SET img='$fileName' WHERE id='$id'";
                        if(mysqli_query($conn,$image)==true){
                            $_SESSION['toast']['type']="success";
                            $_SESSION['toast']['msg']="Successfully updated.";
                        }
                    }else{
                        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
                    }
                }else{
                        $_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                    }
            }
        }
    }

    // Edit Data
     if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
        $data=mysqli_query($conn,"SELECT `title`,`img`,`desc` FROM `".$tblPrefix."cms_pages` WHERE id='$id'");
        $dataP=mysqli_fetch_assoc($data);
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
                                    <div class="form-group col-md-12">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group col-lg-12">
                                                <label for="pname">Name</label>
                                                <input type="type" class="form-control" id="pname" placeholder="Project Name"  name="name" value="<?php if(isset($_GET['id'])){ echo $dataP['title'];}?>" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="plink">Link</label>
                                                <input type="type" class="form-control" id="plink" placeholder="Project Link"  name="link" value="<?php if(isset($_GET['id'])){ echo $dataP['desc'];}?>" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="inputllogo02" name="image" >
                                                    <label class="custom-file-label" for="inputllogo02">Image</label>
                                                </div>
                                                <?php if(isset($_GET['id'])){?>
                                                    <img src="../media/img/projects/<?php if(isset($_GET['id'])){echo $dataP['img'];}?>" class="img-circle img-responsive m-auto mx-2" alt="<?php if(isset($_GET['id'])){echo $dataP['title'];}?>" height="100px;">
                                                <?php }?>
                                            </div>
                                            <button type="submit" class="btn btn-success m-auto" name="submit">Save changes</button>
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