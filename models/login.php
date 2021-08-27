<?php
    session_start();
    
    if(isset($_POST['submit'])){
        
        $email = $_POST['emailL'];
        $pass = md5($_POST['passL']);

        $errors = [];
    	$errLog = fopen("../assets/log/greskaLog.txt", 'ab1');
    	if(!isset($email)){
    		array_push($errors, "User nije napisan.");
    	}
        if(!isset($pass)){
        	array_push($errors, "Lozinka nije ok.");
        }
        if(count($errors)>0){
            $errorsLog = "Failed log attempt" . date("d/m/Y") . "\n". $errors[0]; 
            fwrite($errLog, $errorsLog);
            fclose($errLog);
        	$_SESSION['greske'] = $errors;
        	header("Location: ../index.php?provera=zeza");
        }
        else{
        	require_once "../config/connection.php";
        	$upitLog = "SELECT id, username, email, password, idTip FROM users WHERE email = :email AND password = :pass";

        	$poziv = $konekcija->prepare($upitLog);
        	$poziv->bindParam(":email", $email);
        	$poziv->bindParam(":pass", $pass);
        	$poziv->execute();
        	$rez = $poziv->fetch();
        	if($rez){
        		$_SESSION['username'] = $rez->id;
                $zapis = $email. ":" .date("d/m/Y") ."\n";
                $logLog = fopen("../assets/log/uspesanLog.txt", 'a+');
                fwrite($logLog, $zapis);
                fclose($logLog);
                $_SESSION['USERAKT'] = $rez->idTip;
                if($_SESSION['USERAKT'] == 1){
                    header("Location: ../index.php");    
                }
        		else if($_SESSION['USERAKT'] == 2){
                    header("Location: ../index.php");
                }
        	}
        	else{
        		$_SESSION['greske'] = "Pogresan email ili pasword.";
                $errorsLog = "Failed log attempt " . date("d/m/Y") . "\n". $errors[0]; 
                fwrite($errLog, $errorsLog);
                fclose($errLog);
        		header("Location: ../index.php?provera=neradi");
        	}
        }
    }
?>