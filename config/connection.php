<?php
    require_once "config.php";
    zabeleziPristupStranici();

    try {
        $konekcija = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
        $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }

    function executeQuery($query){
        global $conn;
        return $conn->query($query)->fetchAll();
    }

    function zabeleziPristupStranici(){
        $open = fopen(LOG_FAJL, "a");
        if($open){
            fwrite($open, "{$_SERVER['PHP_SELF']}\t{$_SERVER['REMOTE_ADDR']}\n");
            fclose($open);
        }
    }
?>