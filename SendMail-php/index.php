<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'connection_db.php';

$mail = new PHPMailer(true);

//Consult the DB
$sql = "SELECT day FROM days_off";
$result = mysqli_query($conn, $sql);

//set the timezone and date
date_default_timezone_set('America/Tijuana');
$day = date('w'); //days of the week represented from 0 to 6
$date = date('j'); //current server day

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    if ($row['day'] == $date) {
        if(date(strtotime($day)) == 6 || date(strtotime($day)) == 0) {
            echo 'Is Weekend'; 
            exit();
        } else {
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
                $mail->Subject = 'Mesaje definitivo';
                $mail->Body    = 'este es mi correo electronico, respondeeee';
                $mail->AltBody = 'Rapido';
            
                $mail->send();
                echo 'Message has been sent';
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            } 
        } 
    }
  }
} else {
  echo "There no days off";
}

mysqli_close($conn);

?> */