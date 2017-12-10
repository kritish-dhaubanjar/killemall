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


	<body style="background-color:#000;">
		<div id="wrapper">	
			<div id="main">
				<div id="custom-container-fluid" class="container-fluid">
				<?php include 'library/templates/navbar.php' ?>
				</div>

				<?php 
				if(is_null($_SESSION['cookie-id'])){	
					if(isset($_GET['link'])){	
						include 'library/templates/jumbo.php';
					}	
					else{
						include 'library/templates/fresh.php';
					}
				}
				else if($_SESSION['cookie-activated']==0){
					include 'library/resources/verification.php';
				}
				else{
					include 'library/resources/records.php'; 
				}
				?>

			</div>
			<div class="container-fluid footer">
				<div class="footer-content row">																	
				</div>
				<p>&copy&nbsp 2017, <span class="strike">Business</span> Growth, All Rights Reserved.</p>
			</div>
		</div>	
	</body>
</html>

<?php
	if(isset($_SESSION['error'])){
		switch($_SESSION['error']){
			case 'login_error':
				$alert='warning';
				$alert_msg='Oh snap!,the <strong>login credentials </strong> you submitted are invalid.';
				break;			
			case 'password_error':
				$alert='danger';
				$alert_msg='Oh snap!,the <strong>Password</strong> you submitted is invalid.';
				break;
			case 'code_error':
				$alert='danger';
				$alert_msg='Oh snap!,the <strong>Code</strong> you submitted is invalid.';
				break;				
			case 'agreement_error':
				$alert='info';
				$alert_msg='Warning! Please <strong>agree</strong> our terms of services.';			
				break;
			case 'username_error':
				$alert='warning';
				$alert_msg='Warning! the <strong>username</strong> has alreay been used. Try another one.';			
				break;			
			case 'no_error':
				$alert='success';
				$alert_msg='Alright! You have successfully signed up! Please check your <strong>email</strong> for the <strong>verification code</strong> and <strong>activate</sstrong> your account in the next step.';	
				break;	
			case 'no_error_verify':
				$alert='success';
				$alert_msg='Alright! Please login to continue.';	
				break;					
			case 'field_error':
				$alert='warning';
				$alert_msg='Warning! Better check yourself. You\'r not looking too good.';			
				break;															
		}
?>
	<!-- Modal -->
	<div class="modal fade" id="signup-alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Hey Yo!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="padding: 0px;">
			<div class="alert alert-<?php echo $alert;?>" role="alert" style=" margin: 0px;">
			  <?php echo $alert_msg;?>
			</div>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$('#signup-alert').modal('show');
	</script>


<?php
	unset($_SESSION['error']);
}
?>