<?php

    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

// SMTP Server details and Credentials
    //Only below line can be commented to say the code to not use this smtp config when used hosting-mail.
    // $mail->isSMTP();
    // $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='';
    $mail->Password='';

// Mandatory Value to be set:

    $mail->Port=587;

// Detais of the mail to be send:
    
    $Name = $_POST['name'];
    $mail->Subject="nocnx: New message from ".$Name;
    $mail->setFrom($_POST['email'],$Name);
    $mail->addAddress('alpstech2018@gmail.com');
    $mail->addReplyTo($_POST['email']);
    $mail->isHTML(true);
    $mail->Body= '
     <html>
        <head>
          <title>Query from nocnx</title>
        </head>
        <body>
            <p style="font-size: 20px;"><strong style="color:blue;padding-right: 16px;">Name : </strong>'.$Name.'  </p>
            <p style="font-size: 20px;"><strong style="color: blue;">Subject : </strong>'.$_POST['subject'].' </p>
            <p style="font-size: 20px;color: blue;"><strong>Content :</strong></p>
            <p style="font-size: 16px;" >'. nl2br(htmlspecialchars($_POST['message']))  .'</p>
        </body>
     </html>
     ';
  
    if($mail->send())
        {
            echo 'OK';
        }
    else
        {
            die( 'Some thing went Wrong');
        }


?>
