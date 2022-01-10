<?php 
    include_once("../inc/config.php");
    $pageName="How It Work's";
    
    if(!isset($_SESSION['adminUser'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
//change status...
if(isset($_POST['id']) && $_POST['status']){
    $id = mysqli_real_escape_string($conn, ak_secure_string($_POST['id']));
    $status = mysqli_real_escape_string($conn, ak_secure_string($_POST['status']));
    mysqli_query($conn, "UPDATE `".$tblPrefix."cms_pages` SET `status` = '$status' WHERE `id`=$id");
    exit();
}
// Delete
if(isset($_GET['delete-row'])){
    $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
    $dataQ = mysqli_query($conn, "UPDATE `".$tblPrefix."cms_pages` SET `status` = 0 WHERE `id`=$id"); 
    if($dataQ==true){
        $_SESSION['toast']['msg']="Succesfully Deleted";
        header("location:how-it-work.php");
        exit();
    }else{
        $_SESSION['toast']['msg']="Something Went Wrong";
    }
}


if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,ak_secure_string($_POST['thisId']));
    $name = mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
    $content = mysqli_real_escape_string($conn,ak_secure_string($_POST['content']));
    
    if($id != 0){
        $query= mysqli_query($conn,"UPDATE `".$tblPrefix."cms_pages` SET `title`='[value-3]',`desc`='[value-5]',`date_time`='[value-6]' WHERE id = ".$id);
    }else{
        $query = mysqli_query($conn,"INSERT INTO `".$tblPrefix."cms_pages`(`type`, `title`, `desc`, `date_time`, `status`) VALUES (2,'$name','$content','$cTime',2)");
    }
    
    if($query == true){
        $_SESSION['toast']['type']="success";
        $_SESSION['toast']['msg']="Package Successfully Saved";
        header('location:how-it-work.php');
        exit();
    }else{
        $_SESSION['toast']['type']="error";
        $_SESSION['toast']['msg']="Something went wrong, Please try again later.";
    }
}

$dataQuery = mysqli_query($conn,"SELECT `id`, `type`, `title`, `img`, `desc`, `date_time`, `status` FROM `".$tblPrefix."cms_pages` WHERE type = 2 AND status > 0");
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
                                <div class="card-body row justify-content-center">
                                    <?php   
                                        while( $datahit = mysqli_fetch_assoc($dataQuery ) ){
                                    ?>
                                    <div class="col-lg-5 my-2">
                                        <div class="card m-b-30">   
                                            <div class="card-header">
                                                <h5 class="card-title m-b-0"><?php echo $datahit['title'];?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $datahit['desc'];?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a  href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" data-this-id="<?php echo $datahit['id']?>" data-this-name="<?php echo $datahit['title']?>" data-this-content="<?php echo $datahit['desc']?>" class="edit-this btn btn-primary">Edit</a>
                                                
                                                <a href="#" class="btn btn-danger delete-row" data-this-id="<?php echo $datahit['id']?>">Delete</a>

                                                <span class="ml-5">
                                                    <label class="cstm-switch">
                                                        <input type="checkbox" data-this-id="<?php echo $datahit['id'];?>" name="option" class="cstm-switch-input change-status" <?php if($datahit['status']==2){ echo 'checked';}?>>
                                                        <span class="cstm-switch-indicator"></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add/Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
          <div class="modal-body">
              <input type="hidden" name="thisId" value = "0">
            <div class="form-group col-md-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" value="" name="name" autocomplete="OFF" required="">
            </div>
            <div class="form-group col-md-12">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content" value="" name="content" autocomplete="OFF" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="submit">Save </button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('inc/js.php');?>
<?php include_once('inc/search-bar.php');?>
<script>
    $('.edit-this').on('click', function(){
        $('input[name="thisId"]').val($(this).data('this-id'));
        $('input[name="name"]').val($(this).data('this-name'));
        $('input[name="content"]').val($(this).data('this-content'));
    });

</script>
</body>
</html>