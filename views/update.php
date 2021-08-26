<?php
	$upitTipkorisnika = "SELECT idTip, naziv FROM tipKorisnika";
    $tipKorisnika = $konekcija->query($upitTipkorisnika)->fetchAll();
?>

<div class = "drzacAdm">
	<div class = "row">
		<form method = "POST" action= "models/update.php">
			<h2>Updejtuj usera</h2>
			<lable>Username</lable>
			<br/>
			<input type="text" name="username" value='<?php echo $_GET["user"] ?>'>
			<br/>
			<br/>
			<label>Password</label>
			<br/>
			<input type="password" name="password" value= '<?php echo $_GET["password"] ?>'>
			<br/>
			<br/>
			<label>Email</label>
			<br/>
			<input type="email" name="email" value= '<?php echo $_GET["email"] ?>'>
			<br/>
			<br/>
			<lable>Tip</lable>
			<br/>
			<select name = "tip">
				<?php foreach($tipKorisnika as $tip): ?>
					<option value = "<?=$tip->idTip?>"><?=$tip->naziv?></option>
				<?php endforeach; ?>
			</select>
			<input type = "hidden" name = "id" value = '<?php echo $_GET["password"] ?>'>
			<br/>
			<br/>
			<?php
				echo '<input type = "hidden" name = "id" value ='. $_GET['id'].'>';
			?>
			<button class = "dugmeAdm" type = "submit" name = "izmena">UPDATE</button>
		</form>
	</div>
</div>