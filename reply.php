<?php
require_once "./model/comment.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = new Comment();
    $commentId = $_POST["comment-id"];
    $userId = $_POST["user-id"];
    $reply = $_POST["reply"];
    $comment->setReply($commentId, $userId, $reply);
    header("Location: ./blog.php?id=" . $_POST["blog-id"]);
}