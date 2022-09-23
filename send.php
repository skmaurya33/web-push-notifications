<?php

require_once "includes/config.inc.php";

$conn = new Database();

$sql = "SELECT * FROM webpush_tokens";
$conn->query($sql);
//$conn->bind(':auth_token', $token);
$arrTokens = $conn->resultset();

$arrRegistrationIds = [];

foreach ($arrTokens as $row) {
    $arrRegistrationIds[] = $row['token'];
}

$data = [
    'title' => 'Testing Notification :' . date('Y-m-d H:i:s'),
    'body' => 'Testing Notification from ' . $_SERVER['HTTP_HOST'],
    'icon' => BASE_URL . 'images/icon.png',
    'image' => BASE_URL . 'images/icon.png',
    'click_action' => BASE_URL.'link.php?id=123'
];

if (!empty($arrRegistrationIds)) {
    sendNotifications($arrRegistrationIds, $data);
} else {
    echo 'No token found';
}