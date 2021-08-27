<?php
    $idProizvoda = $_GET['proizvodID'];
    $upitPostera = "SELECT p.idP, p.naziv, p.opis, p.cena, p.slika, p.manjaSlika, p.altSlike, v.velicina FROM posteri AS p INNER JOIN velicina AS v ON
    p.velicina = v.idVelicine WHERE p.idP = :id";
    $posteri = $konekcija->prepare($upitPostera);
    $posteri->bindParam(":id", $idProizvoda);
    $posteri->execute();
    $sadrzajPostera = $posteri->fetch();
?> 
<div id = "proizvodiPrikazProzor"  class = "row">
    <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <img src = "<?=$sadrzajPostera->slika?>" alt = "<?=$sadrzajPostera->altSlike?>" id = "slikaProizvodaZaPrikaz"/>
    </div>
    <div id = "tekstPrikazProizvoda" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <h2><?=$sadrzajPostera->naziv?></h2>
        <p>Cena: <?=$sadrzajPostera->cena?> din.</p>
        <p>Velicina: <?=$sadrzajPostera->velicina?></p>
        <p><?=$sadrzajPostera->opis?></p>
        <?php
        if(isset($_SESSION['USERAKT'])){
            echo "<a href = 'models/dodavanjeCart.php?idP=<?=$sadrzajPostera->idP?>&cartDodavanje=1' type='button' class = 'buttonPrikazKupi'>KUPI</a>";
        }
        else{
            echo "<a href = '#' type='button' class = 'buttonPrikazKupi logStartDiv'>KUPI</a>";
        }
        ?>
    </div>
</div>