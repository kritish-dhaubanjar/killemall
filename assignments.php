<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lab Reports</title>
		<?php include 'library/resources/setup.php';?>
		<?php require 'library/resources/database.php';?>
		<?php
			if(is_null($_COOKIE['cookie-id'])){
				include 'library/templates/restricted.php';
				die();
			}
		?>

	</head>
	<style>
		body{
			background-color = #000 !important;
		}
	</style>
	<body style="background-color = #000 !important;">

<!--
Probability and Statistics 		P&S
Communication English			CE
Software Engineering			SE
Instrumentation II 				INSII
Computer Org & Arch				CO&A
Computer Graphics				CG
Data Communication				DC
-->
<style>
	a,a:hover,a:link{
		text-decoration: none;
	}
</style>
	<div id="wrapper">	
		<div id="main">
			<div id="custom-container-fluid" class="container-fluid">
				<?php include 'library/templates/navbar.php';?>
			</div>

			<?php
				if($_COOKIE['cookie-activated']==0){
					include 'library/resources/verification.php';
				}
				else{ //else		
			?>


			<div class="container jumbotron" style="background-color:transparent; margin-bottom: 0px;">
			  <h1 class="display-4 text-center">Assignmen..</h1>
			  <p class=" lead text-center">Quick! Grab every assignment!</p>
			</div>

			<div class="container">
			<?php
				$subject_name = array ('Probability and Statistics',
									'Communication English',
									'Software Engineering',
									'Instrumentation II',
									'Computer Org & Arch',
									'Computer Graphics',
									'Data Communication');
				$subject_acr = array ('P&S','CE','SE','INSII','CO&A','CG','DC');

				for($i=0 ;$i<7; $i++){
					$count=0;
					$query="SELECT title, sn, acronym, link FROM assignments WHERE acronym='".$subject_acr[$i]."' ORDER BY id DESC";
					$array_result=mysqli_query($con,$query);		
			?>
				<div class="row" style="padding: 15px;">	
				<h5 class="display-5"><?php echo $subject_name[$i];?></h5>
				</div>
				<div class="row" style="padding: 15px;">
					<?php
						while ($array=mysqli_fetch_assoc($array_result)) { //while

					?>				
					<div id="link" class="col-sm-3 col-6">
						<a target='new' href='<?php echo $array['link']; ?>'><button type="button" class="btn <?php if($count==0){echo 'btn-danger';} else {echo 'btn-secondary';}?> btn-block"> <?php echo $array['acronym'].' '.$array['sn'];
							if($count==0){echo '&nbsp<span class="badge badge-default">New</span>';}		
						?></button></a>
					</div>
					<?php
						$count++;	
						}	//while
					?>			
				</div>
				<?php
					}
				?>
			</div>
		</div>

		<?php
			} //else		
		?>

		<div class="footer">
			<p>&copy&nbsp 2017, <span class="strike">Business</span> Growth, All Rights Reserved.</p>
		</div>
	</div>	
	</body>
</html>					