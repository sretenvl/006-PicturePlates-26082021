<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['USERAKT']);
	header("Location: ../index.php");
?>