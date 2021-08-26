<?php
	include "../config/connection.php";

	$upit = "SELECT * FROM posteri";
	if(isset($_POST["minimum_price"])), isset($_POST["maximum_price"] && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])){
		$upit .= "AND cena BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
	}
	if(isset($_POST["naziv"])){
		$naziv_filter = implode("','", $_POST["naziv"]);
		$upit .= "AND naziv IN('".$naziv_filter."')";
	}

	$izmena = $konekcija->prepare($upit);
	$izmena->execute();
	$rez = $izmena->fetchAll();
	$brRedova = $izmena->rowCount();
	$html = '';
	if($brredova > 0){
		foreach($rez as $red){
			$html .=`
			<div class = "proizvod">
				<img src='<?=$red->slika?>' alt='<?=$red->altSlike?>' style="width:100%">
		  		<h1><?=$red->naziv?></h1>
		  		<p class="cena"><?=$red->cena?>£</p>
		  		<p><?=$red->opis?></p>
		  		<p><button>Kupi</button></p>
			</div>`;
		}
		http_response_code(200);
	}
	else{
		$html = '<h3>Ne radi.</h3>';
		http_response_code(404);
	}
	echo $html;
?>