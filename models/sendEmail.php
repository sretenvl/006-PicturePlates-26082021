<?php
    use PHPMailer\PHPMailer\PHPMailer;
    
    if(isset($_POST['porukaPosalji'])){
        echo `
    <script>
        console.log("ucitava");
    </script>`;
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $name = "Picture-Plates";
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];
    
            require_once "../PHPMailer/PHPMailer.php";
            require_once "../PHPMailer/SMTP.php";
            require_once "../PHPMailer/Exception.php";
            
            $mail = new PHPMailer();
    
            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "mejlZaSajtoveIcta@gmail.com";
            $mail->Password = 'erbn6!SV';
            $mail->Port = 465; //587
            $mail->SMTPSecure = "ssl"; //tls
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $body;
    
            if ($mail->send()) {
                $status = "success";
                $response = "Email is sent!";
                //Dodaj response code 200
            } else {
                $status = "failed";
                $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                //Dodaj response code 500
            }
            
            
        }
    }

    
?>
