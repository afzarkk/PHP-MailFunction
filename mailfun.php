<?php 
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function Mailfuntion($name, $email, $dob, $age, $gender, $language, $phonenumber, $address, $city, $folder){        
    $mail = new PHPMailer(true);
    try{
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mail@gmail.com';           // SMTP username
        $mail->Password = 'secret code';                 // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('sivaharidharani@gmail.com', 'Mohamed Afzar');
        $mail->addAddress($email);     // Add a recipient

        // Attach image
        $mail->addAttachment($folder);  // Add attachments

        // Embed image
        $mail->AddEmbeddedImage($folder, 'image_cid'); // Embedding image in the email body

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Thank you for registering';
        $mail->Body = 'Name: ' . $name . '<br>' .
                      'Email: ' . $email . '<br>' .
                      'Dob: ' . $dob . '<br>' .
                      'Age: ' . $age . '<br>' .
                      'Gender: ' . $gender . '<br>' .
                      'Language: ' . $language . '<br>' .
                      'Phone_no: ' . $phonenumber . '<br>' .
                      'Address: ' . $address . '<br>' .
                      'City: ' . $city . '<br>' .
                      'Image: <img src="cid:image_cid">';  // Embedding image in the email body

        // Sending mail
        $mail->send();
        return "Email sent successfully!";
        
    } catch (Exception $e) {
        return "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}
?>
