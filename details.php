<?php
if(isset($_POST['submit'])){
if(isset($_POST['sel'])){
	$branchName = $_POST['sel'];
$conn=mysqli_connect("localhost","root","","portal");

$query="SELECT * FROM branchdetails WHERE branch_name='".$branchName."'";
$result=mysqli_query($conn,$query);
$details=$result->fetch_all();
foreach($details as $det){
echo "<pre>";
print_r($det);
echo "</pre>";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="post">
<select name="sel">
<option value="Information  Technology">IT</option>
<option value="Computer Science">CS</option>
<option value="Electronics">EN</option>
</select>
<input type="submit" name="submit" value="submit">
	</form>	
	
	
	
</body>
</html 