<?php

use PHPMailer\PHPMailer\PHPMailer;	//actual phpmailer lib
use PHPMailer\PHPMailer\Exception;	//for error handling

require '../vendor/autoload.php';	//loads the dependencies you downloaded

//Sender
$email_sender = 'iamjlyadmeen@gmail.com';	//this should be an existing email account
$email_password = 'jlyadmin$2018';	//password of your email_sender
$from_email = "admin@time-machinebylouie.000webhostapp.com";
$from_name = "Admin Louie";	//name of sender

//Receiver
$to_email = "johnlouie252007@yahoo.com";
$to_name = "Louie";
$mail_subject = "Time Machine Order Confirmation";
$mail_body = '<p>Your order has been received and is being processed. Thank you.</p>';

//Sending the email part
$mail = new PHPMailer(true);
try {

	//Settings
	$mail->SMTPDebug = 4;	//level of debug messaging; 4 is lowest, 1 is highest
	$mail->isSMTP();	//make sure to use SMTP to mail. (Simple Mail Transfer Protocol)
	$mail->SMTPOptions = array(	//custom connection options
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)

	);
	$mail->SMTPAuth = true;	//if you are going to use SMTP authentication
	$mail->SMTPSecure = 'tls';	//enables TLS (Transport Layer Security) encryption, 'ssl' is also accepted here
	$mail->Host = 'smtp.gmail.com';	//smtp host of gmail
	$mail->Port = 587;	//This is the default mail submission port.

	//Sender
	$mail->Username = $email_sender;
	$mail->Password = $email_password;
	$mail->setFrom($from_email, $from_name);	//sets the alias of sender

	//Receiver
	$mail->addAddress($to_email, $to_name);	//sets the receiver mail and how to call receiver

	//Actual email
	$mail->isHTML(true);	//reads the html syntax
	$mail->Subject = $mail_subject;
	$mail->Body = $mail_body;

	//Sending email
	$mail->send();

} catch (Exception $error){
	echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
	//ErrorInfo is an attribute
}
?>