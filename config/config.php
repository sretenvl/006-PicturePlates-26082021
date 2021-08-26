<?php

    define("BASE_URL", "http://127.0.0.1/phpSajt3003/");
    define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/phpSajt3003/");

    define("ENV_FAJL", ABSOLUTE_PATH."/config/.env");
    define("LOG_FAJL", ABSOLUTE_PATH."assets/log/log.txt");
    define("ADRESAR", ABSOLUTE_PATH."assets/log/stavke.txt");
    define("SEPARTOR", "&");

    define("SERVER", env("SERVER"));
    define("DATABASE", env("DBNAME"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));

    function env($naziv){
        $open = fopen(ENV_FAJL, "r");
        $podaci = file(ENV_FAJL);
        $vrednost = "";
        foreach($podaci as $key=>$value){
            $konfig = explode("=", $value);
            if($konfig[0]==$naziv){
                $vrednost = trim($konfig[1]); 
            }
        }
        return $vrednost;
    }
?>