<?php

function pre($data) {
    echo '<pre>';
    print_r($data);
    die();
}

function sendNotifications($registration_ids, $data) {
    $header = [
        'Authorization: Key=' . GOOGLE_SERVER_KEY,
        "Content-type: Application/json"
    ];

    $payload = [
        'registration_ids' => $registration_ids,
        'data' => $data
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
