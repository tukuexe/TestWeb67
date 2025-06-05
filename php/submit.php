<?php
// Replace with your actual Telegram bot token and chat ID
$botToken = '8100391135:AAEE1nVfXDpYD9xo4ccYWu-ldtz4aXMd0mk';
$chatId = '6142816761';

// Get form data
$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];

// Create message text
$message = "New Form Submission:\n";
$message .= "Field 1: " . $field1 . "\n";
$message .= "Field 2: " . $field2 . "\n";
$message .= "Field 3: " . $field3;

// Send to Telegram
$telegramUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message
];

$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($telegramUrl, false, $context);

// Redirect to thank you page
header('Location: ../thanks.html');
exit();
?>