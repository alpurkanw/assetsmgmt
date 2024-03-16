<?php

date_default_timezone_set('Asia/Jakarta');

function request_url($method)
{
    $token = '233545768:AAHPuBGxgnhkFdnY6PLh781joeFoWAkXJYg'; //alpurkanbot
    return 'https://api.telegram.org/bot' . $token . '/' . $method;
    // 233545768:AAHPuBGxgnhkFdnY6PLh781joeFoWAkXJYg //alpurkan
    // 1611325798:AAEjpD-u9xZhe75kN-fzNW9-nT3xS5KjoNw //mdsk
}

function sendNotif($chatid, $text)
{
    $data = [
        'chat_id' => $chatid,
        'text' => $text,
        'parse_mode' => 'markdown',
    ];
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);

    $result = file_get_contents(request_url('sendMessage'), false, $context);
    $data[] = json_decode($result, true);
    echo 'Send to : ' . $data['chat_id'] . "\n Message : " . $data['text'];
}
