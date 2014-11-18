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

$chosen = $_POST['chosen'];

foreach ($chosen as $id) {
	$emails[] = $recipients[$id]['email'];
}

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($_POST['mail-body'], 70, "\r\n");

//mail(implode(',', $emails), 'My subject', $message);

header('Location: /skickat');
exit();