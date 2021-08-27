<?php
	$to = 'sretenvladisavljevic@gmail.com';
	$subject = "Test";
	$message = "<h1>Mailer radi ocigledno</h1>";
	mail($to, $subject, $message);
?>