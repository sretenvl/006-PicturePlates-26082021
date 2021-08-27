<?php
    if(isset($_POST['porukaPosalji'])){
        if (isset($_POST['emailP'])&&isset($_POST['subjectP'])&&isset($_POST['bodyP'])) {
            $name = "Picture-Plates";
            $email = $_POST['emailP'];
            $subject = $_POST['subjectP'];
            $body = $_POST['bodyP'];
    
            require_once "../PHPMailer/PHPMailer.php";
            require_once "../PHPMailer/SMTP.php";
            require_once "../PHPMailer/Exception.php";
        
            $mail = new PHPMailer\PHPMailer\PHPMailer();
    
            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "mejlZaSajtoveIcta@gmail.com";
            $mail->Password = 'erbn6!SV';
            $mail->Port = 587; //587
            $mail->SMTPSecure = "tls"; //tls
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $body;
            
            if ($mail->send()) {
                $mail->smtpClose();
                $status = "success";
                $response = "Email is sent!";
                header("Location: ../index.php?mail=radi");
                //Dodaj response code 200
            } else {
                $mail->smtpClose();
                $status = "failed";
                $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                header("Location: ../index.php?mail=neradi");
                //Dodaj response code 500
            }
            
            
        }
    }
?>