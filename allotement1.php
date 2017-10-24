<?php
$conn=mysqli_connect("localhost","root","","portal");
$query="SELECT
dean.id,allotement.collegename,allotement.city,fname,email FROM dean,allotement WHERE allotement.city=dean.city&&dean.collegename<>allotement.collegename&&dean.id<>allotement.id"; 
$result=mysqli_query($conn,$query);
	$results=$result->fetch_all();
	foreach($results as $news){
		echo '<pre>';
		print_r($news);
		echo '</pre>';
	  
?>
	<form action="mail.php" method="post">
	<input class="button" type="submit" name="confirm" value="confirm"> 
	<input type="number" name="id" value="id" min="1">
		</form>
<?php
	}
?>