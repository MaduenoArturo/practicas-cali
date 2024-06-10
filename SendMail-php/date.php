<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set('America/Tijuana');
$mail = new PHPMailer(true);
$date = date('w');
$time = date('H:i');

if(date(strtotime($date)) == 6 || date(strtotime($date)) == 0) {
    if ($time >= strtotime("20")) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'maduenomorales@gmail.com';                     
            $mail->Password   = 'gjsw muiu wrsb vppj';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
            $mail->Port       = 587;                                    
        
            //Who send the email
            $mail->setFrom('maduenomorales@gmail.com', 'madueno');
    
            //Who recieving the email
            $mail->addAddress('rokkalots0@gmail.com', 'ernesto');     //Add a recipient
            $mail->addAddress('maduenomorales@gmail.com', 'morales');     //Add a recipient
            $mail->addAddress('rokkalots156@gmail.com', 'jose');     //Add a recipient
    
            
            $mail->addReplyTo('maduenomorales@gmail.com', 'arturo');
        
        
            //Content
            $mail->isHTML(true);                                
            $mail->Subject = 'Holaaaa';
            $mail->Body    = 'prueba de correo electronico';
            $mail->AltBody = 'como estas?';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'aun no es hora';
    }
} else {
    echo 'Is weekend'; 
} 

?>