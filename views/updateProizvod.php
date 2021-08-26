<?php
	$upitVelicina = "SELECT idVelicine, velicina FROM velicina";
    $velicine = $konekcija->query($upitVelicina)->fetchAll();

	$upitMarki = "SELECT idMarke, marka FROM marke";
    $marke = $konekcija->query($upitMarki)->fetchAll();
?>
<div id = "updejtProizvodaProizvod" class = "drzacAdm">
	<div id = "pozadinaUpdate" class = "admPozadina"></div>>
	<div class = "row">
		<form method = "POST" enctype = "multipart/form-data" action= "models/updateProizvod.php">
			<h2>Updejtuj Proizvod</h2>
			<lable>Naziv Proizvoda</lable>
			<br/>
			<input type = "text" name = "naziv" value = '<?php echo $_GET["naziv"] ?>'>
			<br/>
			<br/>
			<label>Slika proizvoda</label>
			<br/>
			<input type = "file" name = "slika">
			<br/>
			<br/>
			<label>Alt slike</label>
			<br/>
			<input type = "text" name = "altSlike" value = '<?php echo $_GET["altSlike"] ?>'>
			<br/>
			<br/>
			<label>Cena</label>
			<br/>
			<input type = "number" name = "cena" value = '<?php echo $_GET["cena"] ?>'>
			<br/>
			<br/>
			<label>Opis proizvoda</label>
			<br/>
			<input type = "text" name = "opis" value = '<?php echo $_GET["opis"] ?>'>
			<br/>
			<?php
			    foreach($velicine as $velicina):
            ?>
            <input type="checkbox" name="velicna" value="<?=$velicina->idVelicine?>">
            <label> <?=$velicina->velicina?></label><br>
            <?php endforeach;?>
			<br/>
			<?php
			    foreach($marke as $marka):
            ?>
            <input type="checkbox" name="marka" value="<?=$marka->idMarke?>">
            <label> <?=$marka->marka?></label><br>
            <?php endforeach;?>
			<br/>
			<?php
				echo '<input type = "hidden" name = "id" value ='. $_GET['id'].'>';
			?>
			<button class = "dugmeAdm" type = "submit" name = "dodajP">Updejt</button>
		</form>
	</div>
</div>