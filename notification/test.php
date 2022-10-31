<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\CloudMessage;

$path = $_SERVER['DOCUMENT_ROOT'].'/firebase.json';
$factory = (new Factory)->withServiceAccount($path);
$messaging = $factory->createMessaging();

$message = CloudMessage::withTarget("token", "f1qGwPd-k2byM4W7fuUn6A:APA91bHR2zNcWWBfNPapu11OeTvGgCi_D3kmL6KTP4p_W-bEn3iljqSTJ8Is39DOjza7L10bNtbpzNz5AoB17O3GBKqIBFzJ6vDKfNa0J2uiBJZocean1wMwnZkyJQUit-Dav__puuxP")
    ->withNotification(Notification::create('Title', 'Body'))
    ->withData(['key' => 'value']);

$messaging->send($message);
?>