<?php
$count=0;
if(isset($_GET['id'])){
	$value4 = 'id';
	$value1 = 'PROJECT ABSTRACT';
	$value2 = 'Abstract';
	$value5 = 'r_abstract';
	$value3 = 'review';
	$value6 = 'id';
	$value7 = 'p_abstract';
	$value8 = 'ABSTRACTSCORE';
}else if(isset($_GET['review'])){
	$value4 = 'review';
	$value1 = 'PROJECT LITERATURE REVIEW';
	$value2 = 'Literature Review';
	$value5 = 'r_literaturereview';
	$value3 = 'methodology';
	$value6 = 'id';
	$value7 = 'p_literaturereview';
	$value8 = 'LITERATUREREVIEWSCORE';

}else if(isset($_GET['methodology'])){
	$value4 = 'methodology';
	$value1 = 'PROJECT METHODOLOGY';
	$value2 = 'Methodology';
	$value5 = 'r_methodology';
	$value3 = 'analysis';
	$value6 = 'review';
	$value7 = 'p_methodology';
	$value8 = "METHODOLOGYSCORE";
}else if(isset($_GET['analysis'])){
	$value4 = 'analysis';
	$value1 = 'PROJECT ANALYSIS';
	$value2 = 'Analysis';
	$value5 = 'r_analysis';
	$value3 = 'conclusion';
	$value6 = 'methodology';
	$value7 = 'p_analysis';
	$value8 = "ANALYSISSCORE";

}
else if(isset($_GET['conclusion'])){
	$value4 = 'conclusion';
	$value1 = 'PROJECT CONCLUSION';
	$value2 = 'Conclusion';
	$value5 = 'r_conclusion';
	$value3 = 'conclusion';
	$value6 = 'methodology';
	$value7 = 'p_conclusion';
	$value8 = "CONCLUSIONSCORE";
}

if(isset($_POST['submit'])){
	include('../admin1/database.php');
	
	$query1 = "SELECT * FROM GRADE";
	$result1 = $conn->query($query1);
	$i=0;
	$result1->data_seek($i);
	$key2 =$result1->fetch_assoc()[$value8];
	$ans = ($_POST[$value5]/100)*$key2;
	$key= $_GET[$value4];
	if($value7==='p_conclusion'){
		$query="UPDATE RESULT SET $value5=$ans, r_view = 1 WHERE RESULT.ProjectID= $key";
	}else{
	$query="UPDATE RESULT SET $value5=$ans WHERE RESULT.ProjectID= $key";	
	}
	
	$result = $conn->query($query);
	$query3 = "SELECT ifnull(r_abstract,0) + ifnull(r_literaturereview,0)+ifnull(r_methodology,0)+ifnull(r_analysis,0)+ifnull(r_conclusion,0) as total FROM RESULT WHERE RESULT.ProjectID=$key";
	$result3= $conn->query($query3);
	$result3->data_seek($i);
	$ans3 = $result3->fetch_assoc()['total'];
	$query4="UPDATE RESULT SET r_total=$ans3 WHERE RESULT.ProjectID= $key";	
	$result4=$conn->query($query4);
	$conn->close();
	$count = 1;

	
}

?>



<!DOCTYPE html>
<html>
<head>
	<title><?=$value2?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/score.css">
</head>
<body>

	<div class="staticbox">
		<img id = "pix" src="img/fresh.jpg">
			<div id = "cash"><a href="profile.php" class = "links"><h4>Update Biodata</h4></a><br>	
				<a href="project.php" class="links"><h4>Score student</h4></a>	
			</div>
	</div>
	<header>
		<h1>Projects</h1>
	</header>

	<article>
		<h5>Score Projects</h5>
		<br>

		<form method="post" action="score.php?<?=$value4?>=<?= $_GET[$value4]?>">
			<div class="row">
				<div class="col-9">
				<div class = "form-group">
				<h2><?=$value1?></h2>
				<?php
					include('../admin1/database.php');

	$query="SELECT * FROM PROJECT WHERE ProjectID = ".$_GET[$value4];
	$result = $conn->query($query);
	if(!$result) die($conn->error );

	$i = 0;
	$result ->data_seek($i);
	$ans = $result->fetch_assoc()[$value7];
	$conn->close();
				?>
			<input style="text-align:left; width: 100%; height: 600px; overflow-y: auto; border-color: purple" id="color" type="textarea" readonly="" name="" value="<?=$ans?>">
			
		
			

			</div>
				</div>
				<div class="col-3" style="margin-top: 45px;">
					<input style="border-bottom: 0px; border-color: purple" type="number" required="" id="color1" name="<?=$value5?>">
					<input type="submit" id = "color3" name="submit" value="Score <?=$value2?>">
				</div>
		
				</div>	
		
			
		</form>
		<div class="row">
			<div class="col-9">
				<a href="score.php?<?=$value6?>=<?= $_GET[$value4]?>"><button class="btn btn-primary">PREVIOUS</button></a>
			<a href="score.php?<?=$value3?>=<?= $_GET[$value4]?>"><button style="width:100px" class="btn btn-success float-right ">NEXT</button></a> 
				
			</div>
			
		</div>
	</article>

</body>
</html>
<?php
if($count===1){
echo'<script>
	document.getElementById("color").style.borderColor = "green";
	document.getElementById("color1").style.borderColor = "green";
	document.getElementById("color3").style.color = "white";
	document.getElementById("color3").style.backgroundColor = "green";
	</script>';	
}

?>
