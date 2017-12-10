<?php
	ob_start();
	include_once 'database.php';
	session_start();
?>

<style>
	.admin {
		background-color:#eceeef;
	}	
	.jumbotron{
		margin: 0px;
	}
</style>
 
<!--
Probability and Statistics 		P&S
Communication English			CE
Software Engineering			SE
Instrumentation II 				INSII
Computer Org & Arch				CO&A
Computer Graphics				CG
Data Communication				DC
-->

<?php
	if(isset($_GET['category'])&&isset($_GET['title'])&&isset($_GET['number'])&&isset($_GET['link'])){
		$cat=$_GET['category'];
		$sub=$_GET['title'];
		$num=$_GET['number'];
		$link=$_GET['link'];
		switch($sub){
			case 'Probability and Statistics':
				$acr='P&S';
				break;
			case 'Communication English':
				$acr='CE';
				break;
			case 'Software Engineering':
				$acr='SE';
				break;
			case 'Instrumentation II':
				$acr='INSII';
				break;
			case 'Computer Org & Arch':
				$acr='CO&A';
				break;
			case 'Computer Graphics':
				$acr='CG';
				break;
			case 'Data Communication':
				$acr='DC';
				break;
		}

		switch($cat){
			case 'labreports':
				$insert="INSERT INTO labreports (title, acronym, sn, link) VALUES ('$sub','$acr','$num','$link')";
				break;
			case 'assignments':
				$insert="INSERT INTO assignments (title, acronym, sn, link) VALUES ('$sub','$acr','$num','$link')";
				break;
			case 'tutorials':
				$insert="INSERT INTO tutorials (title, acronym, sn, link) VALUES ('$sub','$acr','$num','$link')";
				break;
		}
		if(mysqli_query($con,$insert)){
			$_SESSION['insert']='no_error';
			//mail to all
				$mail_query = "SELECT email FROM credentials WHERE 1";
				$mail_list_raw =  mysqli_query($con, $mail_query);
				while ($email = mysqli_fetch_assoc($mail_list_raw)) {
					$subject = 'New Upload at HELL-0';
					$message = "New $sub $num file added to $cat. Please Check.";
					mail($email['email'], $subject, $message );
				}
			//	
		}else{
			print_r($con);
		}
		header('location:'.$_SERVER['HTTP_REFERER']);
		die();
	}
?>

<div class="admin container-fluid">

	<div class="jumbotron">
<?php
	if($_SESSION['insert']=='no_error'){
?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
		 <h4 class="alert-heading">Well done!</h4>
		  <p>Aww yeah, you successfully added the link.</p>
		  <hr>
		  <p class="mb-0">Whenever you need to, be sure to keep things nice and tidy.</p>
	</div>
<?php
	}
?>	
		<div class="row">	
			<form class="col-md-4" method="GET" action="library/resources/admin.php">
			  <div class="form-group">
			    <label class="display-5">Add a new Link</label>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Select Category</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="category" required>
			      <option value="labreports">Lab Report</option>
			      <option value="assignments">Assignment</option>
			      <option value="tutorials">Tutorial</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Select Subject</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="title" required>
			      <option>Probability and Statistics</option>
			      <option>Communication English</option>
			      <option>Software Engineering</option>
			      <option>Instrumentation II</option>
			      <option>Computer Org & Arch</option>
			      <option>Computer Graphics</option>
			      <option>Data Communication</option>
			    </select>
			  </div>
			  <div class="form-group">
			      <label for="validationCustom05"># Number</label>
			      <input type="text" class="form-control" id="validationCustom05" placeholder="Number" required name="number">
			      <div class="invalid-feedback">
			      </div>
			  </div>			  
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Drive Link</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="link"></textarea>
			  </div>
			  <button class="btn btn-primary" type="submit">Link File</button>
			</form>
			<table class="col-md-8 table table-responsive table-striped">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Name</th>
			      <th>Online</th>
			      <th>Username</th>  
			      <th>Code</th>   
			      <th>Activated</th>      
			      <th>Hits</th> 
				  <th>Email</th>      
				  <th>Admin</th>                        
			    </tr>
			  </thead>
			  <tbody>
			  <?php
			  	$list="SELECT id, name, email, username, hits, activated, code, online, admin FROM credentials WHERE 1";
			  	$list_run=mysqli_query($con,$list);
			  	while($individual=mysqli_fetch_assoc($list_run)){
			  ?>

			    <tr>
			      <th scope="row"><?php echo $individual['id'];?></th>
			      <td><?php echo $individual['name'];?></td>
			      <td><?php 
			      		if($individual['online']==0)
			      			echo '<i class="fa fa-toggle-off" aria-hidden="true"></i>';
			      		else
			      			echo '<i class="fa fa-toggle-on" aria-hidden="true"></i>';
			      ?></td>        
			      <td><?php echo $individual['username'];?></td>
			      <td><?php echo $individual['code'];?></td> 
			      <td><?php echo $individual['activated'];?></td> 
			      <td><?php echo $individual['hits'];?></td> 
			      <td><?php echo $individual['email'];?></td>  
			      <td><?php 
			      		if($individual['admin']==1)
			      			echo '<i class="fa fa-check" aria-hidden="true"></i>';
			      		else
			      			echo '<i class="fa fa-times" aria-hidden="true"></i>';
			      ?></td>  
			    </tr>

			    <?php
			    	}
			    ?>
			  </tbody>
			</table>
		</div>

	</div>
</div>

