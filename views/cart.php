<div class = "col-xl-2 centriranDrzac log">
	<a id = "cart" class = "linkL" href = "#">CART</a>
	<a href ="models/logout.php" class = "dugmeAdm">LOGOUT</a>
</div>

<?php
	require_once "config/connection.php";
    $idUsera = $_SESSION['username'];

    $upitProizvodi = "SELECT count(*) AS broj FROM posteri AS p INNER JOIN cart AS c ON p.idP = c.idP WHERE c.idUsera = :idU";
    $strane = $konekcija->prepare($upitProizvodi);
    $strane->bindParam(":idU", $_SESSION['username']);
    $strane->execute();
    $brStrana = $strane->fetch();
    $brProizvodaNaStrani = 3;
    $brLinkova = ceil($brStrana->broj/$brProizvodaNaStrani);
    $trenutnaStrana = isset($_GET['page']) ? $_GET['page']:2;
    $kolko = $brProizvodaNaStrani * ($trenutnaStrana - 1);

	$upitKorpa = "SELECT p.idP, p.naziv, p.cena, p.manjaSlika, p.altSlike FROM posteri AS p INNER JOIN cart AS c ON p.idP = c.idP WHERE c.idUsera = :idU LIMIT $kolko, $brProizvodaNaStrani;";
	$korpeP = $konekcija->prepare($upitKorpa);
	$korpeP->bindParam(":idU", $_SESSION['username']);
	$korpeP->execute();
	$korpe = $korpeP->fetchAll();
?>
<div id = "cartW">
	<div id = "pozadinaC" class = "pozadina"></div>
	<div id = "cartSad">
		<h1>CART</h1>
        <table class = "tabela">
            <tr>
                <th>Naziv</th>
                <th>Cena</th>
                <th>Slika</th>
                <th>Delete</th>
            </tr>
            <?php foreach($korpe as $korpa): ?>
            <tr>
                <th><?=$korpa->naziv?></th>
                <th><?=$korpa->cena?></th>
                <th><img src=<?=$korpa->manjaSlika?> alt=<?=$korpa->altSlike?>/></th>
                <th><a href = "models/brisanjeCart.php?idP=<?=$korpa->idP?>&idU=<?php echo $idUsera; ?>&cartBrisanje=1" name = "brisanje" class = "dugmeAdm">DELETE</a></th>
            </tr>
            <?php endforeach; ?>
            <?php
                 for($i=0;$i < $brLinkova;$i++):
            ?> 
                <a class = "linkCart" href = "index.php?page=<?=$i+1?>"><?=$i+1?></a>
            <?php endfor; ?>
        </table>
	</div>
</div> 