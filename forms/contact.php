<?php

    require 'vendor/autoload.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/OAuth.php';
    require 'vendor/phpmailer/phpmailer/src/POP3.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Mailer = 'smtp';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->Host =  'smtp.gmail.com';
    $mail->Username = "cedrickfeze24@gmail.com";
    $mail->Password = "jpyj ifte vqyr shmr";


            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);

    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addReplyTo($email);
    $mail->addAddress( "cedrickfeze24@gmail.com", "Cedrick feze");

    $mail->Subject = "Nouveau contact via votre portfolio";

    $mail->Body = "<p><strong>Nom: </strong> {$name} </p>" ."\r\n"
             ."<p><strong>Adresse Mail: </strong> {$email} </p>" ."\r\n"
             ."<p><strong>Sujet: </strong> {$subject} </p>"."\r\n"
             ."<p><strong>Message: </strong> {$message} </p>";


    if($mail->send()){
      echo "Courriel envoyé avec succès";
    }else{
        echo "Message could not be sent.";
        echo "Mailer Error: " . $mail->ErrorInfo;
        }
 ?>