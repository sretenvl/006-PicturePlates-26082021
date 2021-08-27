<?php
	if(isset($_GET["userBrisanje"])){
        $id = $_GET["id"];
        require_once "../config/connection.php";
        $brisanjeUpit = "DELETE FROM users WHERE id = :id";
        $upit = $konekcija->prepare($brisanjeUpit);
        $upit->bindParam(":id", $id);
        $rez = $upit->execute();
        if($rez){
        	header("Location: ../index.php?porvera=radi");
        }
        else{
        	header("Location: ../index.php?provera=zeza");
        }
    }
    if(isset($_GET["posterBrisanje"])){
        $id = $_GET["id"];
        require_once "../config/connection.php";
        $brisanjeUpit = "DELETE FROM posteri WHERE idP = :id";
        $upit = $konekcija->prepare($brisanjeUpit);
        $upit->bindParam(":id", $id);
        $rez = $upit->execute();
        if($rez){
            header("Location: ../index.php?porvera=radi");
        }
        else{
            header("Location: ../index.php?provera=zeza");
        }
    }
    if(isset($_GET["markaBrisanje"])){
        $id = $_GET["id"];
        require_once "../config/connection.php";
        $brisanjeUpit = "DELETE FROM marke WHERE idMarke = :id";
        $upit = $konekcija->prepare($brisanjeUpit);
        $upit->bindParam(":id", $id);
        $rez = $upit->execute();
        if($rez){
            header("Location: ../index.php?porvera=radi");
        }
        else{
            header("Location: ../index.php?provera=zeza");
        }
    }
    if(isset($_GET["velicinaBrisanje"])){
        $id = $_GET["id"];
        require_once "../config/connection.php";
        $brisanjeUpit = "DELETE FROM velicina WHERE idVelicine = :id";
        $upit = $konekcija->prepare($brisanjeUpit);
        $upit->bindParam(":id", $id);
        $rez = $upit->execute();
        if($rez){
            header("Location: ../index.php?porvera=radi");
        }
        else{
            header("Location: ../index.php?provera=zeza");
        }
    }
?>