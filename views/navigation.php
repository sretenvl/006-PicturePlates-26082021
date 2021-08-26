<?php
    $upitMeni = "SELECT idMeni, naziv, href FROM meni";
    $meni = $konekcija->query($upitMeni)->fetchAll();
?>

<nav class = "drzac">
	<div id = "gornjiNav" class="row">
		<div class = "col-xl-2"></div>
		<div id = "logoDrzac" class = "col-xl-8 centriranDrzac">
			<a id = "logoLink" href="index.php"><h1>P I C T U R E&nbsp&nbspP L A T E S</h1></a>
		</div>
		<?php
			if(isset($_SESSION['USERAKT'])){
				if($_SESSION['USERAKT'] == 2){
					include "views/cart.php";
				}
			}
			else{
				include "views/autentifikacijaNav.php";
			}
		?>
	</div>
	<div id="donjiNav" class = "row">
		<?php foreach($meni as $clan): ?>
		<div class = "donjiML col-xl-3"><a href="#<?=$clan->href?>"><?=$clan->naziv?><a></div>
		<?php endforeach; ?>
	</div>
</nav>
