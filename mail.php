<?php
if(isset($_POST['submit'])) 
{

$message=
'Full Name:	'.$_POST['fullname'].'<br />
Subject:	'.$_POST['subject'].'<br />
Email:	'.$_POST['emailid'].'<br />
Comments:	'.$_POST['comments'].'
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection
    $mail->Host = "n3plcpnl0054.prod.ams3.secureserver.net";  //Gmail SMTP server address
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection
    //$mail->SMTPSecure = 'tls';
    $mail->Port = 465;  //Gmail SMTP port
    $mail->CharSet = 'utf-8';
    $mail->SMTPAutoTLS = false;
    
    // Authentication  
    $mail->Username   = "noreply@noxielimited.com"; // Your full Gmail address
    $mail->Password   = "NoxieLimited@2017"; // Your Gmail password
      
    // Compose
    $mail->SetFrom($_POST['emailid'], $_POST['fullname']);
    $mail->AddReplyTo($_POST['emailid'], $_POST['fullname']);
    $mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress("noreply@noxielimited.com", "Noxie"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);
	
	if(!$result){
        echo "Error. Message did not send";
    } else {
        include_once("home.html");
    }

}

?>