<?php
    session_start();
    if(isset($_POST["izmena"])){       
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $email = $_POST["email"];
        $tipKor = $_POST["tip"];
        require_once "../config/connection.php";
        $updateUpit = "UPDATE users SET username = :username, password = :password, email = :email, idTip = :tip WHERE id = :id";
        $izmena = $konekcija->prepare($updateUpit);
        $izmena->bindParam(":id", $id);
        $izmena->bindParam(":username", $username);
        $izmena->bindParam(":password", $password);
        $izmena->bindParam(":email", $email);
        $izmena->bindParam(":tip", $tipKor);
        $izmena->execute();
        header("Location: ../index.php?porvera=radi");
    }
?>