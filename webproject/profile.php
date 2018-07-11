<?php
include('../admin1/database.php');
session_start();
$query = "SELECT * FROM EXAMINER WHERE s_staffnumber = ".$_SESSION['staffnumber'];
$result = $conn->query($query);
$result ->data_seek(0);
$_SESSION['firstname'] = $result->fetch_assoc()['s_firstname'];
$result ->data_seek(0);
$_SESSION['lastname'] = $result->fetch_assoc()['s_lastname'];
$result ->data_seek(0);
$_SESSION['password'] = $result->fetch_assoc()['s_password'];
$result ->data_seek(0);
$_SESSION['phonenumber'] = $result->fetch_assoc()['s_phonenumber'];
$result ->data_seek(0);
$_SESSION['department'] = $result->fetch_assoc()['s_department'];
$result ->data_seek(0);
$_SESSION['faculty'] = $result->fetch_assoc()['s_faculty'];
$result ->data_seek(0);
$_SESSION['email'] = $result->fetch_assoc()['s_mail'];
$result ->data_seek(0);
$_SESSION['address'] = $result->fetch_assoc()['s_address'];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<meta name="viewport" content="device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">

</head>
<body>

	<div id = "staticbox">
	<img id = "pix" src="img/fresh.jpg">
	<div id = "cash">
		

		<a href="profile.php" class = "links"><h4>Update Biodata</h4></a><br>	
	<a href="project.php" class="links"><h4>Score student</h4></a>
	</div>
		
	</div>

	<div id = "changingbox" >
		<h2>Profile</h2>
		
	</div>

	<div class = "card-body">
		
			<div class = "form-group">
				<label for = title>First Name: </label>
				<input type="text" readonly="" class="form-control cab" style="border-color: purple;" value = "<?=$_SESSION['firstname']?>" >
					
			</div><br>

			<div class = "form-group">
				<label for = title>Last Name: </label>
				<input type="text" readonly="" name="" class=" form-control  cab" style="border-color: purple; "  value = "<?=$_SESSION['lastname']?>">
			</div><br>

			<div class = "form-group">
				<label for = title>Change Password: </label>
				<input readonly="" type="text" name="" class=" form-control cab" style="border-color: purple;"  value = "<?=$_SESSION['password']?>">
			</div><br>

			<div class = "form-group">
				<label for = title>Email: </label>
				<input readonly="" type="email" name="" class=" form-control cab" style="border-color: purple;"  value = "<?=$_SESSION['email']?>">


				
			</div><br>

			<div class = "form-group">
				<label for = title>Address: </label>
				<input readonly="" type="text" name="" class=" form-control cab" style="border-color: purple;"  value = "<?=$_SESSION['address']?>">


				
			</div><br>

		<div class = "form-group">
				<label for = >Phone Number: </label>
				<input  readonly="" class="form-control cab" style="border-color: purple;" type="text" name=""  value = "<?=$_SESSION['phonenumber']?>"> 
			</div><br>

				<div class = "form-group">
				<label for = title>Department: </label>
				<input type="text" name="" readonly=""  class=" form-control cab" style="border-color: purple;"  value = "<?=$_SESSION['department']?>">


				
			</div><br>


				<div class = "form-group">
				<label for = title>Faculty: </label>
				<input type="text" name="" readonly=""  class=" form-control cab" style="border-color: purple;"  value = "<?=$_SESSION['faculty']?>">

				<a href="updateprofile.php" ><button class="btn btn-primary float-right">UPDATE BIODATA</button></a>
				
			</div><br>	



		
	</div>






</body>
</html>