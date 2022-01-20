<?php
require_once "../session.php";
require_once "../model/newsLetterTopics.php";

$pageName = "Add NewsLetter";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $newsLetterTopics = new NewsLetterTopics();
    $title = $_POST["title"];
    $topic = $_POST["topic"];
    $discription = htmlspecialchars($_POST["discription"]);

    $template = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>pdf-html</TITLE>
<META name="generator" content="BCL easyConverter SDK 5.0.252">
<META name="author" content="Uday Lal">
<META name="title" content="Add a heading">
<META name="keywords" content="DAE19cNmjsg,BAETHT2BosM">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 0px 0px 0px 0px;padding: 0px;border: none;width: 794px;height: 1123px;}
#page_1 #id1_1 {border:none;margin: 102px 0px 0px 191px;padding: 0px;border:none;width: 603px;overflow: hidden;}
#page_1 #id1_2 {border:none;margin: 161px 0px 0px 262px;padding: 0px;border:none;width: 532px;overflow: hidden;}

#page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:794px;height:1123px;}
#page_1 #p1dimg1 #p1img1 {width:794px;height:1123px;}




.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: bold 75px "Arial";color: #ffffff;line-height: 88px;}
.ft1{font: 28px "Arial";line-height: 43px;}
.ft2{font: 21px "Arial";line-height: 24px;}

.p0{text-align: left;padding-left: 47px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: center;padding-right: 191px;margin-top: 207px;margin-bottom: 0px;}
.p2{text-align: left;margin-top: 0px;margin-bottom: 0px;}




</STYLE>
</HEAD>
<body>
    <div id="page_1">
      <div id="p1dimg1">
        <img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAxoAAARjCAIAAABnqMWCAAATX0lEQVR4nO3YQQ2AMAAEQSDYQxz2aqZ4YB9NkxkF99zcOd/nAADgr2v1AACAvckpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIDknHOu3gAAsDHvFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAMk9xli9AQBgY94pAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAAASOQUAkMgpAIBETgEAJHIKACCRUwAAiZwCAEjkFABAIqcAABI5BQCQyCkAgEROAQAkcgoAIJFTAACJnAIASOQUAEAipwAAEjkFAJDIKQCARE4BACRyCgAgkVMAAImcAgBI5BQAQCKnAACSD76SEC8CWV8MAAAAAElFTkSuQmCC"
          id="p1img1"
        />
      </div>

      <div class="dclr"></div>
      <div id="id1_1">
        <p class="p0 ft0">' . $title . '</p>
        <p class="p1 ft1">' . $discription . '</p>
      </div>
      <div id="id1_2">
        <p class="p2 ft2">(c) Copyrights Smart Auction</p>
      </div>
    </div>
    </body>
    </html>
    ';
    $data = array(
        "title" => $title,
        "discription" => $discription,
        "template" => $template,
        "topic" => $topic
    );
    $newsLetterTopics->create($data);
    header("Refresh: 0");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>
    <title><?php echo $pageName . " | " . "Smart Auction" ?></title>
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
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <h4 class="card-title">Add News Letter</h4>
                                    <form action="./addNewsLetter.php" method="post">
                                        <div class="form-group">
                                            <label for="title">Topic</label>
                                            <input type="text" name="topic" class="form-control" placeholder="Topic"
                                                aria-label="topic">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Title"
                                                aria-label="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="discription">Discription</label>
                                            <textarea class="form-control" name="discription" id="discription"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success m-auto" name="submit">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>