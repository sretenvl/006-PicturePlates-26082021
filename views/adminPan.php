<?php
    $upitUser = "SELECT u.id AS id, u.username AS username, u.password AS password, u.email AS email, u.idTip AS idTip, t.naziv AS userTip FROM users AS u INNER JOIN tipkorisnika AS t ON u.idTip = t.idTip";
    $users = $konekcija->query($upitUser)->fetchAll();

    $upitPostera = "SELECT idP, naziv, opis, cena, slika, manjaSlika, altSlike FROM posteri";
    $posteri = $konekcija->query($upitPostera)->fetchAll();

    $upitMarki = "SELECT idMarke, marka FROM marke";
    $marke = $konekcija->query($upitMarki)->fetchAll();

    $upitVelicina = "SELECT idVelicine, velicina FROM velicina";
    $velicine = $konekcija->query($upitVelicina)->fetchAll();

    echo "<div class = 'container'>";
    if(isset($_GET['promena'])){
        if($_GET['promena'] == "updateProizvod"){
            include "views/updateProizvod.php";
        }
        elseif($_GET['promena'] == "addProizvod"){
            include "views/addProizvod.php";
        }
        elseif($_GET['promena'] == "updateUser"){
            include "views/update.php";
        }
    };

    include "models/poslednjiKorisniciLog.php";
?>
    <div class = "row">
        <h1>Users</h1>
        <a href ="models/logout.php" class = "dugmeAdm">LOGOUT</a>
        <table class = "tabela">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Tip</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <th><?=$user->id?></th>
                <th><?=$user->username?></th>
                <th><?=$user->password?></th>
                <th><?=$user->email?></th>
                <th><?=$user->userTip?></th>
                <th><a href = "index.php?promena=updateUser&id=<?=$user->id?>&user=<?=$user->username?>&password=<?=$user->password?>&email=<?=$user->email?>&tip=<?=$user->idTip?>" class = "dugmeAdm"?>EDIT</a></th>
                <th><a href = "models/brisanje.php?&id=<?=$user->id?>&userBrisanje=da" name = "brisanje" class = "dugmeAdm">DELETE</a></th>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <h1>Tipovi</h1>
        <table class = "tabela">
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Delete</th>
            </tr>
            <?php foreach($marke as $marka): ?>
            <tr>
                <th><?=$marka->idMarke?></th>
                <th><?=$marka->marka?></th>
                <th><a href = "models/brisanje.php?&id=<?=$marka->idMarke?>&markaBrisanje=da" name = "brisanje" class = "dugmeAdm">DELETE</a></th>
            </tr>
            <?php endforeach; ?>
        </table>

        <h1>Velicina</h1>
        <table class = "tabela">
            <tr>
                <th>ID</th>
                <th>Velicina</th>
                <th>Delete</th>
            </tr>
            <?php foreach($velicine as $velicina): ?>
            <tr>
                <th><?=$velicina->idVelicine?></th>
                <th><?=$velicina->velicina?></th>
                <th><a href = "models/brisanje.php?&id=<?=$velicina->idVelicine?>&velicinaBrisanje=da" name = "brisanje" class = "dugmeAdm">DELETE</a></th>
            </tr>
            <?php endforeach; ?>
        </table>

        <h1>Proizvodi</h1>
        <a href ="index.php?promena=addProizvod" id = "dodajProizvod">DODAJ PROIZVOD</a>
        <table class = "tabela">
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Slika</th>
                <th>Manja Slika</th>
                <th>Alt</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach($posteri as $poster): ?>
            <tr>
                <th><?=$poster->idP?></th>
                <th><?=$poster->naziv?></th>
                <th><?=$poster->opis?></th>
                <th><?=$poster->cena?></th>
                <th><?=$poster->slika?></th>
                <th><?=$poster->manjaSlika?></th>
                <th><?=$poster->altSlike?></th>
                <th><a href = "index.php?promena=updateProizvod&id=<?=$poster->idP?>&naziv=<?=$poster->naziv?>&opis=<?=$poster->opis?>&cena=<?=$poster->cena?>&altSlike=<?=$poster->altSlike?>" class = "dugmeAdm"?>EDIT</a></th>
                <th><a href = "models/brisanje.php?&id=<?=$poster->idP?>&posterBrisanje=da" name = "brisanje" class = "dugmeAdm">DELETE</a></th>
            </tr>
            <?php endforeach; ?>
        </table>

        <h1>Poslednji prijavljeni korisnici</h1>
        <table class = "tabela">
            <tr>
                <th>Num.</th>
                <th>Korisnik</th>
            </tr>
            <?php 
                $i = 1;
                foreach($nizKorisnika as $korisnik): 
            ?>
            <tr>
                <?php
                    echo "<th>$i</th>";
                    $i++;
                ?>
                <th><?=$korisnik?></th>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <h1>Danasnji prijavljeni korisnici</h1>
        <table class = "tabela">
            <tr>
                <th>Num.</th>
                <th>Korisnik</th>
            </tr>
            <?php 
                $j = 1;
                foreach($nizKorisnikaDanas as $korisnikDanas): 
            ?>
            <tr>
                <?php
                    echo "<th>$j</th>";
                    $j++;
                ?>
                <th><?=$korisnikDanas?></th>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <div id="piechart"></div>
    </div>
</div>
<script type="text/javascript" src="assets/js/efekti.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="assets/js/chart.js"></script>