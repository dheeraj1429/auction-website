<?php 
    include_once("../inc/config.php");
    $pageName="Blank";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
        $data=mysqli_query($conn,"SELECT * FROM `".$tblPrefix."query` WHERE id='$id'");
        $query=mysqli_fetch_assoc($data);
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
        <section class="admin-content">
        <div class="container-fluid ">
            <div class="row bg-white">
                <?php include_once("inc/mail-sidebar.php");?>
                <div class="col p-all-0">
                    <div class="usable-height  mail-window">
                        <div class="mail-window-header row no-gutters">
                            <div class="col-8 col-lg-6">
                                <a href='feedback.php' title='go back' data-toggle='tooltip' class='btn btn-ghost'>
                                    <i class="mdi mdi-arrow-left mdi-18px"></i>
                                </a>
                                <a href='feedback.php' title='archive this conversation' data-toggle='tooltip' class='btn btn-ghost'>
                                    <i class="mdi mdi-archive mdi-18px"></i>
                                </a>

                                <a href="#" title="mark as spam" data-toggle="tooltip" class="btn btn-ghost">
                                    <i class="mdi mdi-alert-circle mdi-18px"></i>
                                </a>
                            </div>
                            <div class="col-4 col-lg-6  text-right">
                                <a href="#" title="snooze sender" data-toggle="tooltip" class="btn btn-ghost">
                                    <i class="mdi mdi-clock mdi-18px"></i>
                                </a>
                                <a href="#" title="delete this conversation" data-toggle="tooltip"
                                   class="btn btn-ghost">
                                    <i class="mdi mdi-delete mdi-18px"></i>
                                </a>

                            </div>
                        </div>

                        <div class=" mail-window-body">
                            <div class="row p-t-20 p-b-20">
                                <div class="col-md-8 m-b-20">
                                    <div class="media">
                                        <div class="avatar mr-2">
                                            <img src="media/img/users/default.png" class="rounded-circle" alt="">
                                        </div>
                                        <div class="media-body my-auto">
                                            <h6 class="m-0"><?php echo $query['name'];?></h6>
                                            <p class="text-muted"><?php echo $query['email'];?></p>
                                            <p>
                                                <small class="text-muted"><?php echo date("h:i A d-M-Y",strtotime($query['date_time']));?></small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <?php echo htmlspecialchars_decode($query['msg']);?>
                                    <p class="mt-4">
                                        <a class="btn btn-white" data-toggle="collapse" href="#reply" role="button"
                                           aria-expanded="false" aria-controls="reply">
                                            <i class="mdi mdi-reply"></i> Reply
                                        </a>
                                    </p>
                                    <div class="collapse" id="reply">
                                        <div class="card card-body">
                                            <form method="POST">
                                                <div class="form-group col-md-12">
                                                    <label for="head">Subject</label>
                                                    <input type="text" class="form-control" id="subject" placeholder="Subject" value="<?php if(isset($_GET['id'])){echo $query['subject'];}?>" name="sub" autocomplete="off" required="">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="head">Message</label>
                                                     <textarea id="editor" class="form-control" >
                                                        <?php if(isset($_GET['id'])){echo $query['message'];}?>
                                                        </textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="compose-wrapper">
            <div class="compose-container">
                <div class="panel compose-dialog">
                    <div class="panel-header  text-white compose-header">
                        <div class="row compose-toolbar bg-dark">
                            <div class="col-6 my-auto">
                                New Message
                            </div>
                            <div class="col-6 my-auto text-right">

                                <a href="#" class="js-compose-close ">
                                    <i class="mdi mdi-18px mdi-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 border-bottom ">
                                <input type="text" placeholder="Recipients" class="form-control form-control-plaintext">
                            </div>
                            <div class="col-12   ">
                                <input type="text" placeholder="Subject" class="form-control form-control-plaintext">
                            </div>

                        </div>
                    </div>
                    <div class="compose-body ">
                        <textarea id="editor" class="form-control"  cols="30" rows="10"></textarea>
                    </div>
                    <div class="panel-footer compose-footer">
                        <div class="row">
                            <div class="col-6 my-auto">
                                <a href="#" class="btn btn-primary js-compose-close">Send Mail</a>
                            </div>
                            <div class="col-6 my-auto text-right">
                                <a href="#" class="mdi mdi-delete mdi-18px js-compose-close"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
    <?php include_once('inc/search-bar.php');?>
</html>