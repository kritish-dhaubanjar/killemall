<?php
	session_start();
	include_once('database.php');

	if(isset($_GET['code'])){
			$in_code=$_GET['code'];
		if(!empty($_GET['code'])){
			if($_COOKIE['cookie-code']==$_GET['code']){
				$update="UPDATE credentials SET activated='1' WHERE code='$in_code'";
				$update_run=mysqli_query($con,$update);
				$_SESSION['error']='no_error_verify';
				header('location:../../auth.php');
			}
			else{
				$_SESSION['error']='code_error';
			}
		}else{
			$_SESSION['error']='field_error';
		}
	     	header('location:../../auth.php');
	}else{
?>


<div class="container jumbotron" style="background-color:transparent; margin-bottom: 0px;">
  <h1 class="display-4 text-center">Verification Page</h1>
  <p class=" lead text-center">Please check our email and paste the verification code below to start !</p>
  <hr class="my-4">
<div class="row" style="padding-bottom: 160px;">
	<div class="col-md-4 col-sm-6 mx-auto">
	  <form id="verify" action="library/resources/verification.php" method="GET">
		  <div class="form-group">
		    <input type="tel" class="form-control" placeholder="Verification Code Here" name="code">
		  </div>
		  <button type="submit" class="btn btn-secondary btn-lg btn-block">SUBMIT</button>
	  </form>
	</div>
</div>
</div>

<?php
	}
?>