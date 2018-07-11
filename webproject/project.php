<?php

session_start();

include('../admin1/database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<title>project</title>
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
		<h5>Here is the list of Projects</h5>
		<br>
		<div class="row">
			<div class="col-3">
				<div class="row">
					<div class="col-12" style="position:relative; display:block; padding-bottom:15px;background-color:lightgrey; height:180px; padding-top:0px;  bottom: 0px; left: 15px;">
						<a href="project.php?view=notseen"><p>Unexamined Projects</p></a>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-12" style="background-color:lightgrey; height:180px; padding-top:150px; left: 15px;">
						<a href="project.php?view=seen"><p>Examined Projects</p></a>
					</div>
				</div>
			</div>
			<div class="col-8" style="position:relative;text-align: center; ; color: white; margin-left: 100px;">
				<table style="	margin:0; color: black; font-weight: lighter;" class="table table-light	 table-striped table-hover" >
					<tr style="background-color: white; color:purple;font-weight: bolder">
					<th>
						PROJECT ID
					</th>
					<th class="float-right">
						MODIFY
					</th>
				</tr>
				<?php
					if (isset($_GET['view'])) {
						if($_GET['view'] === 'notseen'){
							 $query = "SELECT PROJECT.ProjectID FROM ((PROJECT INNER JOIN RESULT ON PROJECT.ProjectID=RESULT.ProjectID)) WHERE RESULT.s_staffnumber = ".$_SESSION['staffnumber']." AND RESULT.r_view = 0";
						}else{
							$query = "SELECT PROJECT.ProjectID FROM ((PROJECT INNER JOIN RESULT ON PROJECT.ProjectID=RESULT.ProjectID)) WHERE RESULT.s_staffnumber = ".$_SESSION['staffnumber']." AND RESULT.r_view = 1";
						}
					}
						# code...
					else{
						$query = "SELECT PROJECT.ProjectID FROM ((PROJECT INNER JOIN RESULT ON PROJECT.ProjectID=RESULT.ProjectID)) WHERE RESULT.s_staffnumber = ".$_SESSION['staffnumber'];

					}

					$result= $conn->query($query);
					if(!$result) die($conn->error );

					$rows= $result->num_rows;

					for ($i=0; $i < $rows ; ++$i) {
						echo '<tr>';
						$result ->data_seek($i);
							$ProjectID = $result->fetch_assoc()['ProjectID'];
							echo '<th>'.$ProjectID.'</th>';
							echo '<th>
		<a href = "score.php?id='.$ProjectID.'"> <button style="border-radius: 10px 15px; background-color: purple; color: 	white; width: 30%" class="btn float-right"><h6 style="display: inline;">SCORE PROJECT</h6> <img style="width: 15%" src="../Admin1/img/edit.svg"></button></a>
	</th> ';
						echo '</tr>';
					}

				?>
				
				</table>
 			</div>
		</div>

	</article>
</body>
</html>