<?php
require_once "./session.php";
require_once "./model/blog.php";
require_once "./model/comment.php";
require_once "./model/users.php";

function getUserById($id)
{
    $users = new Users();
    return $users->getUserById($id);
}

if (!isset($_GET["id"])) {
    header("Location: index.php");
}
$pageName = "blog";
$comment = new Comment();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["email"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $commentText = htmlspecialchars($_POST["comment"]);
        $blogId = $_GET["id"];
        $reply = json_encode(
            array("reply" => array())
        );

        $data = array(
            "name" => $name,
            "email" => $email,
            "comment" => $commentText,
            "blog_id" => $blogId,
            "user_id" => $_SESSION["userId"],
            "reply" => $reply
        );
        $comment->create($data);
        header("Refresh: 0");
    } else {
        header("Location: ./logIn.php");
        die();
    }
}
$blog = new Blog();
$comments = $comment->read($_GET["id"]);
$blogData = $blog->read($id = $_GET["id"])[0];

?>
<?php require_once "./header.php" ?>

<!-- Header -->

<!-- main -->
<main>
    <!-- blog head -->
    <section class="blog_banner_section padding_one main_bg">
        <div class="container-fluid side_padding">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1><?php echo $blogData["name"] ?></h1>
                </div>
                <div class="col-12 col-md-6 col-lg-6 d-flex user_icons_blog align-items-center justify-content-end">
                    <img src="./assests/icons&images/useGrop.svg" alt="" />
                    <div>
                        <p>bretskymd@gmail.com</p>
                        <p><?php echo date_format(date_create($blogData["post_date"]), "F, d Y") ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog head -->

    <section class="blogs main_bg py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="./media/img/blog/<?php echo $blogData["img"] ?>" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <section class="blogs main_bg py-4">
        <div class="container">
            <?php echo htmlspecialchars_decode($blogData["desc"]) ?>
        </div>
    </section>
    <!-- Comments -->
    <section class="comments_section padding_one main_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 side_padding">
                    <h1>Comments</h1>
                </div>

                <?php foreach ($comments as $c) : ?>
                <div class="row side_padding pt-2 pt-md-5">
                    <?php if (getUserById($c["user_id"])["profile_img"]) : ?>
                    <div class="col-12 col-md-2">
                        <img width="100" height="100"
                            src="./media/img/users/<?php echo getUserById($c["user_id"])["profile_img"] ?>"
                            alt="profile-pic" />
                    </div>
                    <?php else : ?>
                    <div class="col-12 col-md-2">
                        <img width="100" height="100" src="./media/img/users/default.png" alt="profile-pic" />
                    </div>
                    <?php endif; ?>
                    <div class="col-12 col-md-10 pt-3 pt-md-0 commentsUsers">
                        <h3><?php echo getUserById($c["user_id"])["username"] ?> <span
                                class="comment_date light_para ms-2"><?php echo date_format(date_create($c["date"]), "F, d Y") ?></span>
                        </h3>
                        <p class="light_para">
                            <?php echo $c["comment"] ?>
                        </p>

                        <button id="<?php echo $c["id"] ?>" class="replay_Button">Reply</button>
                        <div class="replys">
                            <?php foreach (json_decode($c["reply"], true)["reply"] as $r) : ?>
                            <div class="reply" style="display: flex; margin: 20px 0px">
                                <?php if (getUserById($r["user_id"])["profile_img"]) : ?>
                                <div class="col-12 col-md-2">
                                    <img width="100" height="100"
                                        src="./media/img/users/<?php echo getUserById($r["user_id"])["profile_img"] ?>"
                                        alt="profile-pic" />
                                </div>
                                <?php else : ?>
                                <div class="col-12 col-md-2">
                                    <img width="100" height="100" src="./media/img/users/default.png"
                                        alt="profile-pic" />
                                </div>
                                <?php endif; ?>
                                <div class="col-12 col-md-10 pt-3 pt-md-0 commentsUsers">
                                    <h3><?php echo getUserById($r["user_id"])["username"] ?>
                                    </h3>
                                    <p class="light_para">
                                        <?php echo $r["reply"] ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <form action="./reply.php" method="post" style="display: none"
                            id="reply-form-<?php echo $c["id"] ?>">
                            <input type="hidden" name="comment-id" value="<?php echo $c["id"] ?>">
                            <input type="hidden" name="blog-id" value="<?php echo $_GET["id"] ?>">
                            <input type="hidden" name="user-id" value="<?php echo $_SESSION["userId"] ?>">
                            <input type="text" name="reply" placeholder="Reply" style="margin: 10px"
                                class="form-control" aria-describedby="replyHelpBlock">
                            <button class="btn btn-primary" type="submit">Send</button>
                            <button type="button" class="btn btn-secondary cancel-btn">Cancel</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Comments -->

    <!-- Comment box -->
    <section class="comments_box main_bg pt-5 pb-5">
        <div class="container">
            <div class="row gx-0 side_padding">
                <div class="col-12">
                    <h3>LEAVE A REPLY</h3>
                    <p class="light_para">Your email address will not be published. Required fields are marked *</p>
                </div>


                <form method="post">
                    <div class="col-12 message_aria">
                        <textarea id="" cols="30" name="comment" rows="10" placeholder="Comment"></textarea>
                    </div>
                    <div class="row gx-0 message_aria">
                        <div class="col-12 col-md-6">
                            <input type="text" value="<?php if (isset($_SESSION["userId"])) {
                                                            echo getUserById($_SESSION["userId"])["username"];
                                                        } ?>" name="name" placeholder="Name" />
                        </div>
                        <div class="col-12 col-md-6 ps-0 ps-md-2 mt-2 mt-md-0">
                            <input type="email" value="<?php if (isset($_SESSION["email"])) {
                                                            echo $_SESSION['email'];
                                                        } ?>" name="email" id="" placeholder="Email" />
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="post_button mt-3">POST COMMENT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Comment box -->
</main>
<!-- main -->

<script>
const replyBtns = document.getElementsByClassName("replay_Button");

for (let replyBtn of replyBtns) {
    replyBtn.onclick = () => {
        const commentId = replyBtn.id;
        const form = document.getElementById(`reply-form-${commentId}`);
        form.style.display = "block";
        form.getElementsByClassName("cancel-btn")[0].onclick = () => form.style.display = "none";
    }
}
</script>
<?php require_once "./footer2.php" ?>