<?php
if(isset($_POST['submit'])){
$cname=$_POST['collegename'];
$ccode=$_POST['code'];
$fname=$_POST['fname'];
$mobile=$_POST['mob'];
$email=$_POST['email'];
$pemail=$_POST['pemail'];
$doj=$_POST['doj'];
$exp=$_POST['exp'];
$password=$_POST['password'];
$city=$_POST['city'];
$connection=mysqli_connect('localhost','root','','portal');
if($connection){
echo "connected";
}
else{
echo "failed";
}
$query="INSERT INTO
dean(collegename,code,fname,mob,email,pemail,doj,exp,password,city)";
$query .="VALUES('$cname','$ccode','$fname','$mobile','$email','$pemail','$doj','$exp','$password','$city')";
$result=mysqli_query($connection,$query);
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
		<form action="dean.php" method="post">
			<div class="form-group">
				<label for="">COLLEGE NAME</label>
				<input type="text" name="collegename" class="form-control">
			</div>
				<div class="form-group">
				<label for="">COLLEGE CODE</label>
				<input type="text" name="code" class="form-control">
			</div>
			<div class="form-group">
				<label for="fullname">FULLNAME</label>
				<input type="text" name="fname" class="form-control">
			</div>

				<div class="form-group">
				<label for="mobileno">MOBILE</label>
				<input type="text" name="mob" class="form-control">
			</div>
				<div class="form-group">
				<label for="email">OFFICIAL EMAIL</label>
				<input type="email" name="email" class="form-control">
			</div>
				
				<div class="form-group">
				<label for="email">PERSONAL EMAIL</label>
				<input type="email" name="pemail" class="form-control">
			</div>
			
				<div class="form-group">
				<label for="dateof joining">DATE OF JOINING</label>
				<input type="text" name="doj" placeholder="dddd-mm-yy" class="form-control">
			</div>
			
				<div class="form-group">
				<label for="experience">EXPERIENCE</label>
				<input type="text" name="exp" class="form-control">
			</div>
				<div class="form-group">
				<label for="password">PASSWORD</label>
				<input type="password" name="password" class="form-control">
			</div>
				<div class="form-group">
				<label for="city">CITY</label>
				<input type="text" name="city" class="form-control">
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="submit">
		</form>
	</div>
</div>
</body>
</html 