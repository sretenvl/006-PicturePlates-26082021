<?php
	if(isset($_GET["cartBrisanje"])){
        $idU = $_GET["idU"];
        $idP = $_GET["idP"];
        require_once "../config/connection.php";
        $brisanjeCartUpit = "DELETE FROM cart WHERE idUsera = :idU AND idP = :idP";
        $upit = $konekcija->prepare($brisanjeCartUpit);
        $upit->bindParam(":idU", $idU);
        $upit->bindParam(":idP", $idP);
        $rez = $upit->execute();
        if($rez){
        	header("Location: ../index.php");
        }
        else{
        	header("Location: ../index.php");
        }
    }
?>