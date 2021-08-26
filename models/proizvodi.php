<?php
    $upitProizvod = "SELECT p.idP, p.naziv, p.opis, p.cena, p.slika, p.altSlike, p.velicina, m.marka FROM posteri AS p INNER JOIN marke AS m ON m.idMarke = p.marka";
    $proizvodi = $konekcija->query($upitProizvod)->fetchAll();

    $proizvodiLog=@fopen('assets/log/proizvodi.json',"w");
    $i = count($proizvodi);
    $c = 0;
    fwrite($proizvodiLog, "[");
    foreach($proizvodi as $proizvod){
        fwrite($proizvodiLog, json_encode($proizvod));
        $c++;
        if($i != $c){
            fwrite($proizvodiLog, ",");
        }
    }
    fwrite($proizvodiLog, "]");
    fclose($proizvodiLog);
?>