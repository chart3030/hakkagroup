<?php
    require("PHPMailer-master/class.phpmailer.php");
    require("PHPMailer-master/class.smtp.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host     = "smtp.gmail.com"; // SMTP server
    $mail->From     = "suneetha.itham@gmail.com";
    $mail->AddAddress("suneetha@yantranet.com");
    $mail->Subject  = "First PHPMailer Message";
    $mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
    $mail->WordWrap = 50;
    if(!$mail->Send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }else {
        echo 'Message has been sent.';
    }
?>