<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	
	require 'PHPMailer/PHPMailerAutoload.php';
	require 'PHPMailer/class.phpmailer.php';
	
	$mail = new PHPMailer();
	
	session_start();
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];	

		// connection
		$conn=mysqli_connect("localhost","root","","portal");

		$query = "UPDATE dean SET active = 1 WHERE id='".$id."'";

		$result = mysqli_query($conn, $query);

		if($result){
			
			$mailQuery = "SELECT email from dean WHERE id='".$id."'";
			
			$mailResult = mysqli_query($conn, $mailQuery);
			
			$email = $mailResult->fetch_assoc();
			
			$currentEmail = $email['email'];
			// the message
			$msg = "Your Account has been activated, Please click ". '<a href="http://www.google.com">here</a>'. "to log into your account.";
			
			//$mail->SMTPDebug = 4;	
			
			$mail->isSMTP(true);
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = '7310813051a@gmail.com';
			$mail->Password = 'siyakeram1*';
			$mail->setFrom('7310813051a@gmail.com','UTU');
			$mail->addAddress($currentEmail,'');
			$mail->Subject = 'Account Confirmation Email';
			$mail->msgHTML($msg);
			
			$status = $mail->send();
			
			if($status){
				echo 'Mail Sent';
			}
			else{
				echo $mail->ErrorInfo;
			}
		}
		else {
			echo 'test';
		}
	}
	?>
	
	
</body>
</html 