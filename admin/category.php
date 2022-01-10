<<<<<<< HEAD
<?php
require_once "../model/category.php";
require_once "../session.php";

$pageName = "Category";
$category = new Category();

function getCategory()
{
    $category = new Category();
    return $category->read();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $category->delete($id);
    header("Location: /admin/category.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_category = $_POST["category"];
    $data = array(
        "name" => $_category,
        "status" => 2,
        "date_time" => date("Y-m-d"),
    );
    $category->create($data);
    header("Location: /admin/category.php");
}
if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    die();
}

$categoryData = getCategory();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>

    <title><?php echo "Smart Auction | " . $pageName ?></title>
</head>

<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php'); ?>
    <main class="admin-main">
        <?php include_once('inc/nav.php'); ?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php"); ?>
            <section class="pull-up">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <div class="center" style="display: flex; width: 100%; align-items: center; justify-content: space-between">

                                        <h1>Categories</h1>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Add
                                        </button>
                                    </div>
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($categoryData); $i++) : ?>
                                                    <tr>
                                                        <td><?php echo $i + 1 ?></td>
                                                        <td><?php echo $categoryData[$i]["name"] ?></td>
                                                        <td><?php echo $categoryData[$i]["date_time"] ?></td>
                                                        <td>
                                                            Status
                                                        </td>
                                                        <td id="<?php echo $categoryData[$i]["id"] ?>" class="<?php echo $categoryData[$i]["name"] ?>">
                                                            <button data-toggle="modal" data-target="#editModal" type="button" class="btn btn-primary edit-btn">Edit</button>
                                                            <a href="/admin/category.php?id=<?php echo $categoryData[$i]["id"] ?>" type="button" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/category.php" method="post">
                        <div class="modal-body">
                            <input type="text" name="category" class="form-control" placeholder="Add Category">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/updateBlogCategory.php" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id-input">
                            <input id="edit-form" type="text" name="category" class="form-control" placeholder="Add Category">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        const editButtons = document.getElementsByClassName("edit-btn");

        for (let button of editButtons) {
            button.onclick = () => {
                const parentNode = button.parentElement;
                const idInput = document.getElementById("id-input");
                const editForm = document.getElementById("edit-form");
                const nodeId = parentNode.id;
                const nodeValue = parentNode.className;
                idInput.value = nodeId;
                editForm.value = nodeValue;
            }
        }
    </script>
</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

=======
<?php 
    include_once("../inc/config.php");
    $pageName="Blog Category";
    
    if(!isset($_SESSION['adminUser'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($conn,ak_secure_string($_POST['cat']));
        if(isset($_GET['id'])){
            $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
            $query="UPDATE `".$tblPrefix."category` SET `name`='$name' WHERE id='$id'";
        }else{
            $query="INSERT INTO `".$tblPrefix."category`( `name`, `status`, `date_time`) VALUES ('$name',2,'$cTime')";
        }
        if(mysqli_query($conn,$query)==true){
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Succesfully Submited";
            header("location:category.php");
            exit();
        }else{
            $_SESSION['toast']['type']="error";
            $_SESSION['toast']['msg']="Something Went Wrong, Please Try Again Later.";
        }
    }

    // category Data 
    if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
        $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `id`,`name` FROM `".$tblPrefix."category` WHERE id='$id'"));
    }
    //change status...
    if(isset($_POST['id']) && $_POST['status']){
        $id = mysqli_real_escape_string($conn, ak_secure_string($_POST['id']));
        $status = mysqli_real_escape_string($conn, ak_secure_string($_POST['status']));
        mysqli_query($conn, "UPDATE `".$tblPrefix."category` SET `status` = '$status' WHERE `id`=$id");
        exit();
    }
    // Delete
    if(isset($_GET['delete-row'])){
        $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
        $dataQ = mysqli_query($conn, "UPDATE `".$tblPrefix."category` SET `status` = 0 WHERE `id`=$id"); 
        if($dataQ==true){
            $_SESSION['toast']['msg']="Succesfully Deleted";
            header("location:category.php");
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
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <form method="POST">
                                            <div class="form-group col-md-12">
                                                <label for="cat">Category Name</label>
                                                <input type="text" class="form-control" id="cat" placeholder="Category Name" name="cat" value="<?php if(isset($_GET['id'])){echo $data['name'];}?>" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success px-5 py-2" name="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <h3 class="text-center">Categories</h3>
                                        <div class="table-responsive p-t-10">
                                            <table id="example" class="table   " style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $s=0;
                                                    $dataCat=mysqli_query($conn,"SELECT `id`,`name`,`status`,`date_time` FROM `".$tblPrefix."category` WHERE status>0 ");
                                                    while($dataC=mysqli_fetch_assoc($dataCat)){
                                                        $s++;
                                                ?>
                                                <tr>
                                                   <td><?php echo $s;?></td>
                                                   <td><?php echo $dataC['name'];?></td>
                                                   <td><?php echo date("d-M-Y",strtotime($dataC['date_time']));?></td>
                                                   <td>
                                                        <span class="ml-5">
                                                            <label class="cstm-switch">
                                                                <input type="checkbox" data-this-id="<?php echo $dataC['id'];?>" <?php if($dataC['status']==2){ echo 'checked';}?>  name="option" class="cstm-switch-input change-status">
                                                                <span class="cstm-switch-indicator"></span>
                                                            </label>
                                                        </span>
                                                    </td>
                                                   <td> 
                                                        <a href="category.php?id=<?php echo $dataC['id'];?>" class="btn btn-primary">
                                                            <i class="mdi mdi-grease-pencil"></i>
                                                        </a>
                                                        
                                                        <a href="#" class="btn btn-danger delete-row" data-this-id="<?php echo $dataC['id'];?>">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
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
                </div>
            </section>
        </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
>>>>>>> 783d3e3e56913e4faa1c71688f6d9041b928ee07
</html>