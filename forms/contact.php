<?php
   
     $UserName = $_POST['name'];
     $Sub = "nocnx: New message from ".$UserName;
     $Subject = $_POST['subject'];
     $message = nl2br(htmlspecialchars($_POST['message']));
     $Msg = '
     <html>
        <head>
          <title>Query from nocnx</title>
        </head>
        <body>
            <p style="font-size: 20px;"><strong style="color:blue;padding-right: 16px;">Name : </strong>'.$UserName.'  </p>
            <p style="font-size: 20px;"><strong style="color: blue;">Subject : </strong>'.$Subject.' </p>
            <p style="font-size: 20px;color: blue;"><strong>Content :</strong></p>
            <p style="font-size: 16px;" >'. $message  .'</p>
        </body>
     </html>
     ';
     
  
    //  $to = 'pinaki.j@gmail.com';
     $to = 'alpstech2018@gmail.com';
     $header = "From: ".$UserName."<". strip_tags($_POST['email']) .">\r\n";
     $header .= "Reply-To:" . strip_tags($_POST['email']) . "\r\n";
     $header .= "Bcc: swagatsourav92@gmail.com". "\r\n";
    //  $headers .= "X-Priority: 1 (Highest)\n"; 

    //  $headers .= "X-MSMail-Priority: High\r\n"; 
      
     $header .= "MIME-Version: 1.0\r\n";
     $header .= "Content-type: text/html\r\n";
     $headers .= "Importance: High";
      
     
     if(mail($to,$Sub,$Msg,$header))
       {
           die( 'OK');
       }
     else
      {
          die( 'NOT OK');
      }

?>
