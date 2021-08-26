<?php

	if(isset($_POST['submit'])){
		$user = $_POST["username"];
		$pass = $_POST["password"];
		$email = $_POST["email"];

  		$tEmail = "/^[\w]+[\.\_\-\w]*\@[\w]+([\.][\w]+)+$/";
		$tPassword="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

		$errors = [];
		$errLog = fopen("../assets/log/greskaLog.txt", 'ab1');
		if(!isset($user)){
			array_push($errors, "Polje user je obavezno.");
		}
		if(!isset($pass) && !preg_match($tPassword, $pass)){
			array_push($errors, "Polje password je obavezno.");
		}
		if(!isset($email) && !preg_match($tEmail, $email)){
			array_push($errors, "Polje email je ne tačan.");
		}
		if(!isset($_POST['broj']) AND ($_POST['broj'] != $_SESSION['random'])){
            array_push($errors, "Capca ne radi.");
        }
		if(count($errors)>0){
			$errorsLog = "Failed register attempt" . date("d/m/Y") . "\n".$errors[0]; 
            fwrite($errLog, $errorsLog);
            fclose($errLog);
        	$_SESSION['greske'] = $errors;
        	header("Location: ../index.php?provera=zeza");
		}
		else{
			include "../config/connection.php";
			$upit = "INSERT INTO users(id, username, password, email, idTip) VALUES (NULL, :user, :pass, :email, 2)";

			$poziv = $konekcija->prepare($upit);
			$poziv->bindParam(":user", $user);
			$poziv->bindParam(":pass", md5($pass));
			$poziv->bindParam(":email", $email);
			$poziv->execute();
            header("Location: ../index.php");
		}

	}
?>