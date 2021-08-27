<?php
    $pristupljeniKorisnici = file("assets/log/uspesanLog.txt");
    $nizKorisnika = [];
    $nizKorisnikaDanas = [];

    foreach($pristupljeniKorisnici as $row){
        $deoReda = explode(":", $row);
        array_push($nizKorisnika, $deoReda[0]." ". $deoReda[1]);
        if(trim($deoReda[1]) == date("d/m/Y")){
            array_push($nizKorisnikaDanas, $deoReda[0].$deoReda[1]);
        }
    }
?>