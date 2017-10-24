<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
		<?php
	session_start();
	if (isset($_SESSION['current_user'])) {
    
		$role='';
		$role2='';

		// connection
		$conn=mysqli_connect("localhost","root","","portal");

		$session = $_SESSION['current_user'];

		if($session['role'] == 'webadmin'){
			$role = 'dean';
			?>

			<a href="http://localhost/demo/allotement1.php">ALLLOTMENT</a>
			<?php
		}

		if($session['role'] == 'dean'){
			$role = 'hod';
			$role2 = 'faculty';
		}

		if($session['role'] == 'hod'){
			$role = 'faculty';
		}
		
		if($session['role'] == 'faculty'){
	        $role1 = 'faculty';
	   	    $id=$session['id'];
			$query1="SELECT * FROM dean WHERE role='".$role1."'&& id='".$id."'";
			$result1 = mysqli_query($conn,$query1);

		    if($result1->num_rows > 0){	

				$row_data1 = $result1->fetch_assoc();
	
				foreach($row_data1 as $data1){
				
					echo '<pre>';
						print_r($data1);
					echo '</pre>';
			
				}
				  	?>
		<form action="update.php" method="post">
					<input type=submit name="update" value="UPDATE">
		</form>
	
		<form action="" method="post">
	
	
			<style>
				select{height:20px}
				select:focus{height:auto}
			</style>

			<p align="top-right">
			<?php
				
			// get all the subjects for the current user from DB and store the results in subject_array.	
			$interested_subjects = mysqli_query($conn,"SELECT * FROM user_meta WHERE user_id='".$id."'");
				
				$checked = $interested_subjects->fetch_all();
				$subject_array = [];
				foreach($checked as $thisChecked){
					array_push($subject_array,$thisChecked[2]);
				}
				
				?>
				<input type="checkbox" name="subject[]" value="java" <?php 
				if(in_array("java",$subject_array)){?> checked = "checked"  <?php  }?>><label>Java</label><br>
				<input type="checkbox" name="subject[]" value="asp.net"
				<?php 
				if(in_array("asp.net",$subject_array)){?> checked = "checked"  <?php  }?>><label>ASP.Net</label><br>
				<input type="checkbox" name="subject[]" value="algorithms"
				<?php 
				if(in_array("algorithms",$subject_array)){?> checked = "checked"  <?php  }?>><label>Algorithms</label><br>
			</p>
			<input type="submit" name="save" value="save">
		</form>
	
			  <?php 
					  if(isset($_POST['save'])){
						$deleteQuery = "DELETE FROM user_meta WHERE user_id = '".$id."'";
						  $deleteStatus = mysqli_query($conn,$deleteQuery);
						  
						  if(isset($_POST['subject'])) {
							
							  $sub=$_POST['subject'];
						  	  foreach($sub as $subj){
						  	  	$query1="INSERT INTO user_meta(subjects,user_id)";
						  	  	$query1.="VALUES('$subj','$id')";
						  	  	$chkresult=mysqli_query($conn,$query1);  
							  }
					 		}
						  
						  header('Location: test.php');
				  		}
					  }
					}
		


		$query = "SELECT * FROM dean WHERE role='".$role."' OR role='".$role2."'";

		$result = mysqli_query($conn,$query);

		if($result->num_rows > 0){	

			$row_data = $result->fetch_all();
	
			foreach($row_data as $data){
				
				echo '<pre>';
					print_r($data);
				echo '</pre>';
				?>
				
				<form action="confirm.php" method="post">
					<input type=submit name="confirm" value="confirm">
				<input type="hidden" name="id" value="<?php echo $data['0']; ?> ">
				</form>
				<?php
			}
	}
	}
	
	else {
		header('Location: signin.php');
	}
	
	?>
	
	
	<form action="logout.php" method="get">
		<input class="btn btn-primary" type="submit" name="log out" value="sign out">
		
	</form>
</body>
</html> 