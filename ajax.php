<?php

require_once "includes/config.inc.php";

if (!empty($_POST['token'])) {
    $post = $_POST;
    $conn = new Database();
    //pre($post);
    $sql = "INSERT INTO webpush_tokens (token) VALUES (:token)";
    $conn->query($sql);
    $conn->bind(':token', $post['token']);

    if ($conn->execute()) {
        echo 'Token saved..';
    } else {
        echo 'Failed to save token..';
    }
}
