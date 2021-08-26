<?php
    session_start();
    include "config/connection.php";
    include "views/head.php";
?>
    <div id = "omotac">

<?php
    if(isset($_SESSION['USERAKT'])){
        $provera = $_SESSION['USERAKT'];
            switch ($provera){
                case 1:
                    $_SESSION['STRANA'] = "admin";
                    include "views/adminPan.php";
                    include_once "models/dodajProizvodLog.php";
                    break;           
                default:
                    $_SESSION['STRANA'] = "logovan";
                    include_once "models/dodajProizvodLog.php";
                    include "views/navigation.php";
                    include "views/log.php";
                    include "views/register.php";
                    if(isset($_GET['proizvodID'])){
                        $_SESSION['STRANA'] = "proizvod";
                        include "views/prikazProzor.php";
                        include_once "models/dodajProizvodLog.php";
                    }
                    else{
                        $_SESSION['STRANA'] = "gost";
                        include_once "models/dodajProizvodLog.php";
                        include "views/main.php";
                        include "views/autor.php";
                    }
                    include "views/footer.php";
                    break;
            }
    }
    else{
        include "views/navigation.php";
        include "views/log.php";
        include "views/register.php";
        if(isset($_GET['proizvodID'])){
            $_SESSION['STRANA'] = "proizvod";
            include "views/prikazProzor.php";
            include_once "models/dodajProizvodLog.php";
        }
        else{
            $_SESSION['STRANA'] = "gost";
            include_once "models/dodajProizvodLog.php";
            include "views/main.php";
            include "views/autor.php";
        }
        include "views/footer.php";
    }
?>
</div>
</body>
</html>


