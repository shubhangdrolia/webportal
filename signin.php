<?php 
if(isset($_POST['submit'])){
	
	// getting field data
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	// connection
	$conn=mysqli_connect("localhost","root","","portal");
	
	$query="SELECT * FROM dean WHERE email='".$email."'";
	
	//  firing query
	$result=mysqli_query($conn,$query);

	if($result->num_rows > 0){   // whenever object we do ->
		//whenever array we do[]
		$row_signin = $result->fetch_assoc();
	
		if($row_signin['active'] != 0){
			// check for the validation of the result
			if($password==$row_signin['password']){
				session_start();
				$_SESSION['current_user'] = $row_signin;

				header('Location: test.php');
			}
			else {
				echo 'Please try again.';
			}
		}
		else{
			echo'Your request is under process right now, please wait you will recieve a confirmation email.';
		}
	}
	else {
		echo 'please try again';
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="col-sm-6">
		<form action="signin.php" method="post">
			<div class="form-group">
				<label for="fullname">EMAIL</label>
				<input type="email" name="email" class="form-control">
			</div>
				<div class="form-group">
				<label for="password">PASSWORD</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="Log in">
	
</form>
	</div>
	</div>	
</body>
</html>