<!DOCTYPE html>
<html>
<head>

	
	<title>Staff login page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stafflogin.css">
		<meta name = "viewport" content="width=device-width, initial - scale = 1.0">
</head>
<body>
	<!-- <div class = "contain"></div> -->
<div class = "bg">
	
	<div class = "layer">
		
		


<div class = "display-1" style="margin-left: -100px"> Examiner Login</div>
<div class="card" style="width: 40rem;">
		


		<div class="card-body">
			
			


			<!-- <p class="card-text">Some kind better examples t cool,this will my first c ad . glory to Go </p>
 -->


			<form method= "post" action="stafflogin.php" >
				<div class = "form-group has-error">
					<label for = "example1">Staff Number</label>
					<input type="number" name= "staffnumber" class="form-control" id = "fish" aria-describedby = "emailHelp" >
					<small id = "emailHelp" class="form-text"> we will never share your email with anyone</small>

				</div>


				<div class = "form-group">
					<label for = "example2">Password</label>
					<input type="password"  name= "password" class="form-control" id = "" aria-describedby = "emailHelp">
					<small id = "emailHelp" class="form-text text-muted"> your default password is your surname in lowercase</small>

				</div>

				 <input type="submit" name="submit" value="Login" class="btn btn-login btn-primary btn-block">

				<small id = "emailHelp" class="form-text text-muted"> 
				  <a href="#">forgot password</a>  |  <a href="#">reset to default</a> </small>



				



			</form>

		
	</div>
</div>












	</div>



</div>



	

<!-- <div id = "heading">  <h1>fiiish</h1></div> -->

<!--   <button  type="button" class ="btn btn-warning">CLICK HERE</button> -->
<!-- <h1 class ="display-1" id = "stafflogin">Staff Login</small></h1> -->

 <!-- <h1 class ="display-1">Display<small>secondary text</small></h1>
  <h1 class ="display-2">Display</h1>
    <h1 class ="display-3">Display</h1> -->

	
	

<script src="validation.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
     include('../admin1/database.php');
    $query = 'SELECT * FROM EXAMINER WHERE s_staffnumber = '.$_POST['staffnumber'].' AND s_password = "'.$_POST['password'].'"';
    $result = $conn->query($query);
    if($result->num_rows === 0){
        echo'<script> alert("username and password mismatch")</script>';
    }else{
    	session_start();
    	$_SESSION['staffnumber'] = $_POST['staffnumber'];
        echo'<script>location="profile.php"</script>';
    }
    $conn->close();

}

?>