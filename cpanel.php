<?php
	ob_start();
	session_start();
	require 'library/resources/database.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project Killemall</title>
		<?php include 'library/resources/setup.php'	?>
	</head>

	<body>
		<div id="wrapper">	
			<div id="main">
				<div id="custom-container-fluid" class="container-fluid">
					<?php include 'library/templates/navbar.php' ?>
				</div>
			</div>

			<?php
				if($_COOKIE['cookie-admin']==0){
			?>

				<div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px; padding-top:100px; padding-bottom: 245px;">
				  <div class="container">
				    <h2 class="display-4"><i class="fa fa-lock" aria-hidden="true"></i>Restricted Access</h2>
				    <p class="lead">Sorry, Your Access to the control panel is restricted.</p>
				    <p class="lead">You do not have permission to view this page.</p>
				    <a href="././index.php"><button type="button" class="btn btn-primary">Return home</button></a>
				  </div>
				</div>
				
			<?php
				}else{
					include 'library/resources/admin.php';
				}
			?>

			<div class="container-fluid footer">
				<div class="footer-content row">																	
				</div>
				<p>&copy&nbsp 2017, <span class="strike">Business</span> Growth, All Rights Reserved.</p>
			</div>
		</div>	
	</body>
</html>
<?php
	unset($_SESSION['insert']);
?>