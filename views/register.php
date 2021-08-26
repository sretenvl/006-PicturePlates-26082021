<?php
	$_SESSION['random'] = rand(100000, 999999);

?>
<div id = "SI" class = "loginDrzac">
	<div id = "pozadinaS" class = "pozadina"></div>
		<form method = "POST" action = "models/register.php">
			<h2 class = "logN">PICTURE &nbsp PLATES</h2>
			<h3>Register</h3>
			<input type = "text" name = "username" placeholder = "Username"/>
			<br/>
			<input type = "password" name = "password" placeholder = "Password"/>
			<br/>
			<input type = "email" name = "email" class = "formaInput" placeholder = "Email"/>
			<br/>
			<input type="text" id = "capcaInput" class = "formaInput" name="broj"/>
			<img class = "formaInput" alt="captcha" src="models/random_picture.php"/>
			<br/><br/>
			<button type = "submit" name = "submit">Register</button>
		</form>
	</div>
</div> 