<?php

if(isset($_POST["fname"])) {
	// Read the form values
	$success = false;
	$fName = isset( $_POST['fname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
	$cName = isset( $_POST['cname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['cname'] ) : "";
	$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";
	
	//Headers
	$to = "aizaz@gmail.com";
    $subject = 'Contact Us';
	$headers  = 'From: Your name <ayyaz@gmail.com>' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	//body message
	$message = "Your Name: ". $fName . "<br> Company Name: ". $cName . "<br> Email: ". $senderEmail . "<br> phone: ". $phone . "<br> Message: " . $message . "";
	
	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
      
    echo ($send_email) ? '<div class="success alert alert-success text-center rounded-pill mt-2">Email has been sent successfully.</div>' : 'Error: Email did not send.';
}
else
{
	echo '<div class="failed alert alert-danger text-center rounded-pill mt-2">Failed: Email not Sent.</div>';
}
?>