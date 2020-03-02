<?php
require_once "bootstrap.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}
$post = $newPost->getPostsID($_GET['id']);

if (isset($_POST['btnDel'])) {
    if (file_exists('Photo/'.$post->Photo)) {
        if ($post->Photo != "default.jpg") {
            unlink('Photo/'.$post->Photo);
        }
        $newPost->deletePost($_GET['id']);
    }
    header("Location: /");
    exit;
}
require_once "views/posts/deletePost.view.php";
