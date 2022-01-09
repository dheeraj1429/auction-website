<?php 
    include_once("../inc/config.php");
    $pageName="Projects";
    
    if(!isset($_SESSION['adi'])){
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
    if(isset($_GET['delete-row'])){
        $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
        $dataQ = mysqli_query($conn, "UPDATE `".$tblPrefix."cms_pages` SET `status` = 0 WHERE `id`=$id"); 
        if($dataQ==true){
            $_SESSION['toast']['msg']="Succesfully Deleted";
            header("location:projects.php");
            exit();
        }else{
            $_SESSION['toast']['msg']="Something Went Wrong";
        }
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
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Project Name</th>
                                                <th>Project Image</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $p=0;
                                                $dataProject=mysqli_query($conn,"SELECT `id`,`title`,`img`,`desc`,`date_time`,`status` FROM `".$tblPrefix."cms_pages` WHERE status>0 AND type=4");
                                                while($dataP=mysqli_fetch_assoc($dataProject)){
                                                    $p++;
                                            ?>
                                            <tr>
                                               <td><?php echo $p;?></td>
                                               <td><?php echo $dataP['title'];?></td>
                                               <td><img src="../media/img/projects/<?php echo $dataP['img'];?>" height=80px;></td>
                                               <td><?php echo date("d-M-Y",strtotime($dataP['date_time']));?></td>
                                               <td>
                                                    <span class="ml-5">
                                                        <label class="cstm-switch">
                                                            <input type="checkbox" data-this-id="<?php echo $dataP['id'];?>" <?php if($dataP['status']==2){ echo 'checked';}?>  name="option" class="cstm-switch-input change-status">
                                                            <span class="cstm-switch-indicator"></span>
                                                        </label>
                                                    </span>
                                               </td>
                                               <td> 
                                                    <a href="add-project.php?id=<?php echo $dataP['id'];?>" class="btn btn-primary">
                                                        <i class="mdi mdi-grease-pencil"></i>
                                                    </a>
                                                    
                                                    <a href="#" class="btn btn-danger delete-row" data-this-id="<?php echo $dataP['id'];?>">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Project Name</th>
                                                <th>Project Image</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>     
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
<a href="add-project.php" class="btn-floating btn btn-primary" id="Add Section" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
    <i class="mdi mdi-plus"></i>
</a>
</body>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
</html>