<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; // for error handling
$parent = dirname(_FILE_,2);

require_once $parent.'/vendor/autoload.php'; //loads the dependencies you downloaded

function sendMail($usermail, $username, $mail_subject, $mail_body){
	//Sender
	$email_sender ='iamjlyadmeen@gmail.com';
	$email_password ='jlyadmin$2018';
	$from_email = "admin@time-machinebylouie.000webhostapp.com";
	$from_name =  "Admin Louie";

	// //Receiver
	// $usermail = "oxino.renzchler@gmail.com";
	// $username = "Renz";
	// $mail_subject = "Pure Food Order#ajd5423sad5663214665";
	// $mail_body = "<p>Your order has been received and is being processed.</p>";

	$mail = new PHPMailer(true);
		try{
			//Settings
			$mail->SMTPDebug = 0; //level of debug messaging 4 is the lowest, 1 is the highest
			$mail->isSMTP(); //make sures to use SMTP to mail.
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->SMTPAuth = true; // if you are going to use SMTP Authentication
			$mail->SMTPSecure = 'tls'; //Enables TLS encryption
			$mail->Host = 'smtp.gmail.com'; //smtp host of gmail
			$mail->Port = 587; //This is the default mail submission port

			//Sender
			$mail->Username = $email_sender;
			$mail->Password = $email_password;
			$mail->setFrom($from_email,$from_name);

			//Receiver
			$mail->addAddress($usermail,$username);

			//Actual Email Content
			$mail->isHTML(true); //allows HTML syntax
			$mail->Subject = $mail_subject;
			$mail->Body = $mail_body;
			
			$mail->send();
			
		} catch(Exception $error){
			echo 'Message couldn\'t be sent. Mailer Error:' . $mail->ErrorInfo;
		}
	}
?>