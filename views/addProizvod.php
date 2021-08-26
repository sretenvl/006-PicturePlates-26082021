<?php
    include "models/proizvodi.php";

    $upitVelicina = "SELECT idVelicine, velicina FROM velicina";
    $velicine = $konekcija->query($upitVelicina)->fetchAll();
?>
<div id = "dodavanjeProizvodaProizvod" class = "drzacAdm">
	<div class = "row">		
		<form method = "POST" enctype = "multipart/form-data" action= "models/addProizvod.php">
			<h2>Dodaj Proizvod</h2>
			<lable>Naziv Proizvoda</lable>
			<br/>
			<input type = "text" name = "naziv">
			<br/>
			<br/>
			<label>Slika proizvoda</label>
			<br/>
			<input type = "file" name = "slika">
			<br/>
			<br/>
			<label>Alt slike</label>
			<br/>
			<input type = "text" name = "altSlike" placeholder = "Dodaj alt">
			<br/>
			<br/>
			<label>Cena</label>
			<br/>
			<input type = "number" name = "cena">
			<br/>
			<br/>
			<label>Opis proizvoda</label>
			<br/>
			<input type = "text" name = "opis">
			<br/>
			<?php
			    foreach($velicine as $velicina):
            ?>
			<input type="radio" name="velicina" value="<?=$velicina->idVelicine?>">
            <label> <?=$velicina->velicina?></label><br>
            <?php 
				endforeach;
			?>
			<br/>
			<?php
			    foreach($marke as $marka):
            ?>
			<input type="radio" name="marka" value="<?=$marka->idMarke?>">
            <label> <?=$marka->marka?></label><br>
            <?php 
				endforeach;
			?>
			<br/>
			<button class = "dugmeAdm" type = "submit" name = "dodajP">Dodaj</button>
		</form>
	</div>
	<div id = "pozadinaAdd" class = "admPozadina"></div>
</div>

