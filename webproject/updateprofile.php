<?php

session_start();

if(isset($_POST['submit'])){
	include('../admin1/database.php');
	$_SESSION['firstname'] = $_POST['firstname'];

	$_SESSION['lastname'] = $_POST['lastname'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['phonenumber'] = $_POST['phonenumber'];
	$query = "UPDATE EXAMINER SET s_firstname='".$_SESSION['firstname']."',s_lastname='".$_SESSION['lastname']."',s_password='".$_SESSION['password']."',s_address='".$_SESSION['address']."',s_phonenumber='".$_SESSION['phonenumber']."'";
	$result= $conn->query($query);
		if(!$result) die($conn->error );
	$conn->close();
	
}

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
		<form action="updateprofile.php" method="POST">
			<div class = "form-group">
				<label for = title>First Name: </label>
				<input type="text" class="form-control cab" name="firstname" style="border-color: purple;" value = "<?=$_SESSION['firstname']?>" >
					
			</div><br>

			<div class = "form-group">
				<label for = title>Last Name: </label>
				<input type="text" class=" form-control  cab" name="lastname" style="border-color: purple; "  value = "<?=$_SESSION['lastname']?>">
			</div><br>

			<div class = "form-group">
				<label for = title>Change Password: </label>
				<input type="password" id = "pass1" onblur="checkPass()" class=" form-control cab" name="password" style="border-color: purple;" value = "<?=$_SESSION['password']?>">
			</div><br>

			<div class = "form-group">
				<label for = title>Confirm Password: </label>
				<input type="password" id="pass2" onblur="checkPass()" class=" form-control cab" style="border-color: purple;" value = "<?=$_SESSION['password']?>">


				
			</div><br>

			<div class = "form-group">
				<label for = title>Address: </label>
				<input type="text" class=" form-control cab" style="border-color: purple;" name="address" value = "<?=$_SESSION['address']?>">


				
			</div><br>

		<div class = "form-group">
				<label for = >Phone Number: </label>
				<input class="form-control cab" style="border-color: purple;" type="" name="phonenumber"  value = "<?=$_SESSION['phonenumber']?>"> 
			</div><br>

			<input style="width: 20%;" type="submit" name="submit" value="Submit" class="btn btn-login btn-primary btn-block">
        <br/>

				




		</form>
	</div>






</body>
<script type="text/javascript">
	
	function checkPass(){
		if(document.getElementById('pass1') != document.getElementById('pass2')){
			alert("password mismatch");
		}

	}
</script>
</html>