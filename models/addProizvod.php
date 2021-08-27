<?php
	define("FILE_SIZE", 2000000);

	$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
	session_start();
    if(isset($_POST["dodajP"])){
    	require_once "../config/connection.php";
    	$file = $_FILES['slika'];
    	$size = $file['size'];
    	$type = $file['type'];

    	$tmp = $file['tmp_name'];
    	$fileName = $file['name'];
    	$fajl = time() . "_" . $fileName;
    	$path = "../assets/images/noveSlike/".$fajl;
    	$putanjaBaza = "assets/images/noveSlike/".$fajl;
    	$errors = [];

    	if(!in_array($type, $allowedTypes)){
    		array_push($errors, "Tip slike nije dobar.");
			http_response_code(400);
    	}
    	elseif($size > FILE_SIZE){
    		array_push($errors, "Slika je prevelika.");
			http_response_code(400);
    	}
    	else{
			move_uploaded_file($tmp, $path);
			$imgSize = getimagesize($path);
			$width = $imgSize[0];
			$height = $imgSize[1];
			$newWidth = 50;
			$newHeight = $height/($width/$newWidth);
			$novaManjaSlika = "assets/images/manjeSlike/manja_".$fajl;
			if( $type=='image/jpeg' || $type=='image/jpg' ){
				$uploaded = imagecreatefromjpeg($path);
				$prazno = imagecreatetruecolor($newWidth,$newHeight);
				imagecopyresampled($prazno, $uploaded, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);			
				imagejpeg($prazno, "../".$novaManjaSlika);
			}else{
				$uploaded = imagecreatefrompng($path);
				$prazno = imagecreatetruecolor($newWidth,$newHeight);
				imagecopyresampled($prazno,$uploaded,0,0,0,0,$newWidth,$newHeight,$width,$height);
				imagepng($prazno, "../".$novaManjaSlika);		
			} 

    		$naziv = $_POST['naziv'];
    		$cena = $_POST['cena'];
    		$opis = $_POST['opis'];
			$altSlike = $_POST['altSlike'];
			$velicina = $_POST['velicina'];
			$marka = $_POST['marka'];

			$upit = "INSERT INTO posteri(naziv, cena, opis,slika, manjaSlika, altSlike, velicina, marka) VALUES (:naziv, :cena, :opis, :slika, :manjaSlika, :alt, :velicina, :marka)";
    		$izmena = $konekcija->prepare($upit);
    		$izmena->bindParam(":naziv", $naziv);
			$izmena->bindParam(":cena", $cena);
			$izmena->bindParam(":opis", $opis);
			$izmena->bindParam(":slika", $putanjaBaza);
			$izmena->bindParam(":manjaSlika", $novaManjaSlika);
			$izmena->bindParam(":alt", $altSlike);
			$izmena->bindParam(":velicina", $velicina);
			$izmena->bindParam(":marka", $marka);
			$izmena->execute();
			header("Location:../index.php?porvera=radi");
    	}
    };
?>