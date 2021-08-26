<?php
	require_once "../config/connection.php";
	if(isset($_GET["idP"])){
		header("Location: ../index.php");
	}
	$upit = "INSERT INTO cart(idCart, idUsera, idP) VALUES (NULL, :idU, :idP)";
	session_start();
	$poziv = $konekcija->prepare($upit);
	$poziv->bindParam(":idP", $_GET["idP"]);
	$poziv->bindParam(":idU", $_SESSION['username']);
	$poziv->execute();
	header("Location: ../index.php");
?>