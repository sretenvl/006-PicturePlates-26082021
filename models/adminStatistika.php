<?php
    $statistika = file("../assets/log/log.txt");
    $greske = file("../assets/log/greskaLog.txt");
    $uspesanLog = file("../assets/log/uspesanLog.txt");
    $pristupiUkupno = file("../assets/log/logStranica.txt");
    $brojRedovaG = count($greske);
    $brMain = count($statistika);
    $brUpesnogLog = count($uspesanLog);
    $brPristupaCounter = count($pristupiUkupno);
    $brMainCount = 0;
    $brGresaka = 0;
    $brUspLog = 0;
    $brKor = 0;
    
    $brAdmin = 0;
    $brLogovan = 0;
    $brGost = 0;
    $brProizvod = 0;
    $red = "";

    for($i = 0;$i < $brojRedovaG; $i++){
        $brGresaka++;
    }
    for($j = 0;$j < $brMain; $j++){
        $brMainCount++;
    }
    for($k = 0;$k < $brUpesnogLog; $k++){
        $brUspLog++;
    }

    foreach($pristupiUkupno as $row){
        $deoReda = explode(":", $row);
        if($deoReda[0] == "Admin strana je pristupljena"){
            $brAdmin++;
        }
        if($deoReda[0] == "Main logovana strana je pristupljena"){
            $brLogovan++;
        }
        if($deoReda[0] == "Main gost strana je pristupljena"){
            $brGost++;
        }
        if($deoReda[0] == "Proizvod strana je pristupljena"){
            $brProizvod++;
        }
    }
    $brUlaza = ["brojGresaka" => $brGresaka, "brojUkupnihUcitavanja" => $brMainCount, "brojUspesnihLogovanja" => $brUspLog];
    $pristupCounter = ["brojAdm" => $brAdmin, "brojLog" => $brLogovan, "brojGost" => $brGost, "brojProizvod" => $brProizvod];
    echo json_encode($pristupCounter);  
?>

