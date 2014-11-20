<?php
// ToDo: 
// Sanity checks
// Validation
// Default values
// Comments

define('DEBUG', TRUE);

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

if (in_array('all', $chosen)) {
	foreach ($recipients as $key => $party) {
		foreach ($party['members'] as $key => $member) {
			$emails[] = $member['email'];
		}
	}
} else {
	foreach ($chosen as $key) {
		list($partyKey, $memberKey) = explode('_', $key);
		$emails[] = $recipients[$partyKey]['members'][$memberKey]['email'];
	}	
}

$headers  = "From: $name <$email> \r\n";
$headers .= "Sender: info@minpolitiker.se \r\n";
$headers .= "Return-Path: info@minpolitiker.se \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "BCC: " . implode(',', $emails) . "\r\n";

if (DEBUG == TRUE) {
	var_dump($subject);
	var_dump($message);
	var_dump($headers);
	die();
} else {
	//$result = mail(null, $subject, $message, $headers);
	header('Location: /skickat');
	exit();
}
