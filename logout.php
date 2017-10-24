<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<?php 
	
	session_start();
	if(isset($_SESSION['current_user'])){
		unset($_SESSION['current_user']);
		header('Location: signin.php');
	}
	else{
		header('Location: signin.php');
	}
	
	
	?>
	
	
</body>
</html 