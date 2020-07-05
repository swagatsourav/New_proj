<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // https://www.coderomeos.org/php-mail-function-for-urgent-and-high-priority
  // Replace contact@example.com with your real receiving email address

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
// Version -1 ////////////////////////////////


//  $UserName = $_POST['name'];
//   $Email = $_POST['email'];
//   $Subject = $_POST['subject'];
//   $Msg = $_POST['message'];
//   $to = 'swagat.miku@gmail.com';
//		
//   
//   if(mail($to,$Subject,$Msg,$Email))
//     {
//         die( 'OK');
//     }
//   else
//    {
//        die( 'NOT OK');
//    }
 
 // Version -2 ////////////////////////////////
 
  //  $UserName = $_POST['name'];
  //  $Subject = $_POST['subject'];
  //  $Msg = nl2br(htmlspecialchars($_POST['message']));
  //  $to = 'swagat.miku@gmail.com';
  //  $header = "From:". $_POST['email'] ."\r\n";
  //  $header .= "Reply-To:" . $_POST['email'] . "\r\n";
  //  $header .= "Bcc: projects@nocnx.com". "\r\n";
  //  $header .= "MIME-Version: 1.0\r\n";
  //  $header .= "Content-type: text/html\r\n";
   

		
   
  //  if(mail($to,$Subject,$Msg,$header))
  //    {
  //        die( 'OK');
  //    }
  //  else
  //   {
  //       die( 'NOT OK');
  //   }
 

  // Version -3 
    
  // $UserName = $_POST['name'];
  //  $Subject = $_POST['subject'];
  //  $Msg = '
  //  <html>
  //  <head>
  //    <title>Birthday Reminders for August</title>
  //  </head>
  //  <body>
  //    <p>Here are the birthdays upcoming in August!</p>
  //    <table>
  //      <tr>
  //        <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
  //      </tr>
  //      <tr>
  //        <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
  //      </tr>
  //      <tr>
  //        <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
  //      </tr>
  //    </table>
  //  </body>
  //  </html>
  //  ';
   

  //  $to = 'swagat.miku@gmail.com';
  //  $header = "From:". $_POST['email'] ."\r\n";
  //  $header .= "Reply-To:" . $_POST['email'] . "\r\n";
  //  $header .= "Bcc: projects@nocnx.com". "\r\n";
  //  $header .= "MIME-Version: 1.0\r\n";
  //  $header .= "Content-type: text/html\r\n";

		
   
  //  if(mail($to,$Subject,$Msg,$header))
  //    {
  //        die( 'OK');
  //    }
  //  else
  //   {
  //       die( 'NOT OK');
    // }


    //  Version -4 
    
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
