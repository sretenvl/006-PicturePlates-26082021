<?php
    $log = fopen("assets/log/logStranica.txt", 'ab+');
    $checker = $_SESSION['STRANA'];
	if($checker == "admin"){
        $zapis = "Admin strana je pristupljena:" . date("d/m/Y") . "\n";
    }
    if($checker == "logovan"){
        $zapis = "Main logovana strana je pristupljena:" . date("d/m/Y") . "\n";
    }
    if($checker == "gost"){
        $zapis = "Main gost strana je pristupljena:" . date("d/m/Y") . "\n";
    }
    if($checker== "proizvod"){
        $zapis = "Proizvod strana je pristupljena:" . date("d/m/Y") . "\n";
    }
    fwrite($log, $zapis);
    fclose($log);
?>