<?php


   ini_set( 'display_errors', 1 );
   error_reporting( E_ALL );
   $from = "pascal.carbony@gmail.com";
   $to = "kouame.ksma@gmail.com";
   $subject = "Checking PHP mail";
   $message = "
   <html>
   <head>
       <title>This is a test HTML email</title>
   </head>
   <body>
       <p>Hi, it's a test email. Please ignore.</p>
   </body>
   </html>
   ";
  // The content-type header must be set when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   $headers = "From:" . $from;
   if(mail($to,$subject,$message, $headers)) {
      echo "Message was sent.";
   } else {
      echo "Message was not sent.";
   }


$data = json_decode(file_get_contents(__DIR__ . "/assets/datas/data.json"), true);

?>