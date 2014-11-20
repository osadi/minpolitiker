<?php

// Simple simple captcha thingie
if (strtolower($_POST['question']) != 'ja') {
	header('Location: /');
	exit();
}

if (empty($_POST['mail-body']) ||
	empty($_POST['chosen'])    ||
	empty($_POST['email'])     ||
	empty($_POST['name'])      ) {
		header('Location: /');
		exit();
}

include __DIR__ . '/recipients.php';

$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['mail-body'];
$chosen  = $_POST['chosen'];
$subject = $_POST['subject'];

foreach ($chosen as $id) {
	$emails[] = $recipients[$id]['email'];
}

//mail(implode(',', $emails), 'My subject', $message);
$headers = 'From: '. $name .' <info@minpolitiker.se>' . "\r\n" .
    'Reply-To: '.  $replyTo . "\r\n";

$headers = "From: $name <$email> \r\n" .
	"Sender: info@minpolitiker.se \r\n" .
	"Return-Path: info@minpolitiker.se \r\n" .
	"Reply-To: $email \r\n";

$subject = '[TEST] - Du lovade oss';

$result = mail(implode(',', $emails), $subject, $message, $headers);

header('Location: /skickat');
exit();
