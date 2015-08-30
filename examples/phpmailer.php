<?php

require_once 'vendor/autoload.php' ; 

$mailer = new PHPMailer() ; 

$mailer->Host       = 'smtp.gmail.com' ; 
$mailer->SMTPAuth   = true ; 
$mailer->SMTPSecure = 'tls' ; 
$mailer->Port       = 587 ; 
$mailer->Username   = 'test@mail.com' ; 
$mailer->Password   = 'password' ; 
$mailer->From       = 'test@mail.com' ; 
$mailer->isHTML( true ) ; 

$mail = new thom855j\mail\MailWrapper( $mailer ) ; 

$template = 'welcome_email.php' ; 
$data     = array( 'Name' => 'Test' ) ; 
$callback = function($message) 
{ 
    $message->to( 'mail@email.com' ) ; 
    $message->subject( 'Test mail' ) ; 
} ; 
$mail->send( $template , $data , $callback ) ; 
