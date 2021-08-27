<?php
    $upitMarke = "SELECT * FROM marke";
    $marke = $konekcija->query($upitMarke)->fetchAll();

    $markeLog=@fopen('assets/log/marke.json',"w");
    $i = count($marke);
    $c = 0;
    fwrite($markeLog, "[");
    foreach($marke as $marka){
        fwrite($markeLog, json_encode($marka));
        $c++;
        if($i != $c){
            fwrite($markeLog, ",");
        }
    }
    fwrite($markeLog, "]");
    fclose($markeLog);
?>