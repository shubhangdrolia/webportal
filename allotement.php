<?php
if(isset($_POST['submit'])){
$city=$_POST['city'];
$collegename=$_POST['collegename'];
$id=$_POST['id'];
$conn=mysqli_connect("localhost","root","","portal");
$query="INSERT INTO allotement(collegename,city,id)";
$query.="VALUES('$collegename','$city','$id')";
$result=mysqli_query($conn,$query);
echo "Thank You You Will Get A Mail In Which College You Are Alloted";
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
		<form action="" method="post">
				<div class="form-group">
				<label for="">COLLEGE NAME</label>
				<input type="text" name="collegename" class="form-control">
				</div>
				<div class="form-group">
				<label for="">CITY</label>
				<input type="text" name="city" class="form-control">
				</div>
				<div class="form-group">
				<label for="fullname">id</label>
				<input type="number" name="id" class="form-control">
				</div>
				<input class="btn btn-primary" type="submit" name="submit" value="submit">
		</form>
	</div>
</div>
</body>
</html>