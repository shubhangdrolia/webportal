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
	if(isset($_POST['confirm'])){
		$id=$_POST['id'];
	$conn=mysqli_connect("localhost","root","","portal");
				
		$query="SELECT email FROM dean where id='".$id."'";
		$sql = "SELECT allotement.collegename,dean.id FROM dean,allotement WHERE allotement.city=dean.city&&dean.collegename<>allotement.collegename&&dean.id<>allotement.id&&dean.id='".$id."'";
		$checksum1=mysqli_query($conn,$sql);
//		$query1="SELECT collegename from '$checksum1' where id='".$id."'";
//		$run=mysqli_query($conn,$query1);
//		print_r($run);
//		die();
		$checksum=$checksum1->fetch_all();
		$achieve1=$checksum[0];
	 	$achieve2=$achieve1[0];  // collegename
		$achieve11=$checksum[1];
		$achieve12=$achieve11[0];// collegename
		$checksum=mysqli_query($conn,$query);
		$sum[]=$checksum->fetch_assoc();
		$email = $sum['0'];
		$currentemail = $email['email'];
		$msg="Your Center For Practical Examination Will Be ".$achieve2.",".$achieve12." Thank you..";
	
		
		
			$mail->isSMTP(true);
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = '7310813051a@gmail.com';
			$mail->Password = 'siyakeram1*';
			$mail->setFrom('7310813051a@gmail.com','UTU');
			$mail->addAddress($currentemail,'');
			$mail->Subject = 'Center Allotement Email';
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

	?>
	
	
	
</body>
</html 