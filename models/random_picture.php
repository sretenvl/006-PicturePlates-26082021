<?php
	session_start();
	$random_broj = $_SESSION['random'];
	
	$slika = imagecreatefromjpeg("../assets/images/back2.jpg");
	header("Content-type: image/png");
	$text_boja = ImageColorAllocate($slika, 0, 0, 0);
	ImageString($slika, 10, 10, 5, $random_broj, $text_boja);
	ImagePng($slika);
?>