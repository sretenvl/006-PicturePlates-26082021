<?php
    session_start();
    header("Location: ../index.php?porvera=radi");  
    if(isset($_POST["novo"])){      
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        require_once "../config/connection.php";
        $updateUpit = "UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id";
        $izmena = $konekcija->prepare($updateUpit);
        $izmena->bindParam(":id", $id);
        $izmena->bindParam(":username", $username);
        $izmena->bindParam(":password", $password);
        $izmena->bindParam(":email", $email);
        $izmena->execute();
        header("Location: ../index.php?porvera=radi");
    
    }

?>