<?php
require_once "../session.php";
require_once "../model/newsLetter.php";
require_once "../model/newsLetterTopics.php";
require_once "../sendEmail.php";

$pageName = "News Letter";

$newsLetter = new NewsLetter();
$newsLetterTopics = new NewsLetterTopics();
$newsLettersData = $newsLetter->read();

$newsLetterTopicsData = $newsLetterTopics->read();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $emails = $data["emails"];
    $newsLetterTemplate = $newsLetterTopics->read($id = $data["topic"])[0]["template"];
    foreach ($emails as $email) {
        sendEmail($email, $newsLetterTemplate);
    }
    die();
}

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
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
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-8">
                                <div class="card-body">
                                    <div style="display: flex; justify-content: space-between">
                                        <h4>News Letter</h4>
                                        <div style="margin: 10px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Select Topic
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($newsLetterTopicsData as $n) : ?>
                                                    <a class="dropdown-item topic" href="#"
                                                        id="<?php echo $n["id"] ?>"><?php echo $n["topic"]; ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <button id="send" role="button" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="check-all" type="checkbox"
                                                                aria-label="Checkbox for following text input">
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>Id</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($newsLettersData); $i++) : ?>
                                                <td>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input class="select"
                                                                value="<?php echo $newsLettersData[$i]["email"] ?>"
                                                                type="checkbox"
                                                                aria-label="Checkbox for following text input">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $newsLettersData[$i]["email"] ?>
                                                </td>
                                                <td>
                                                    <span class="ml-5">
                                                        <label class="cstm-switch">
                                                            <input type="checkbox"
                                                                data-this-id="<?php echo $newsLettersData[$i]['id']; ?>"
                                                                name="option" class="cstm-switch-input change-status"
                                                                <?php if ($newsLettersData[$i]['status'] == 2) {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        } ?>>
                                                            <span class="cstm-switch-indicator"></span>
                                                        </label>
                                                    </span>
                                                </td>
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
    </main>

    <script>
    const selects = document.getElementsByClassName("select");
    const selectAll = document.getElementById("check-all");
    const topics = document.getElementsByClassName("topic");
    const send = document.getElementById("send");
    let selectTopic = "";
    let emails = [];

    for (let topic of topics) {
        topic.onclick = () => {
            selectTopic = topic.id;
        }
    }

    selectAll.onclick = () => {
        if (selectAll.checked) {
            for (let select of selects) {
                select.checked = true;
                emails.push(select.value);
            }
        } else {
            for (let select of selects) {
                select.checked = false;
                emails = [];
            }
        }
    }
    for (let select of selects) {
        select.onclick = () => {
            if (select.checked) {
                emails.push(select.value);
            } else {
                const index = emails.indexOf(select.value);
                emails.pop(index);
            }
        }
    }

    send.onclick = () => {
        if (selectTopic !== "") {
            fetch("./newsLetter.php", {
                method: "POST",
                headers: {
                    "content-type": "application/json;charset=UTF-8",
                },
                body: JSON.stringify({
                    emails: emails,
                    topic: selectTopic
                })
            });
        }
    }
    </script>
    <?php include_once('inc/js.php'); ?>
    <?php include_once('inc/search-bar.php'); ?>
</body>

</html>