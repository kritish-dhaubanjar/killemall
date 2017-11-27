<?php
	session_start();
	require 'library/resources/database.php';

	if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword'])&&isset($_POST['check'])){

		if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['repassword'])){

			$name=$_POST['name'];
			$email=$_POST['email'];
			$username=$_POST['username'];
			if(strlen($_POST['password'])<5){
				$password='6c3e226b4d4795d518ab341b0824ec29';
			}else{
				$password=md5($_POST['password']);
				$repassword=md5($_POST['repassword']);
			}
			$check=$_POST['check'];			

			$search="SELECT username FROM credentials WHERE username='$username'" ;
			$search_run=mysqli_query($con,$search);
			$result=mysqli_num_rows($search_run);

			if(strcmp($password,$repassword)!=0){
				$_SESSION['error']='password_error';
			}
			else if($check=='disagree'){
				$_SESSION['error']='agreement_error';
			}
			else if($result!=0){
				$_SESSION['error']='username_error';
			}
			else{
				$_SESSION['error']='no_error';
				$message=time();
				$query="INSERT INTO credentials (name, email, username, password, code) VALUES ('$name', '$email', '$username', '$password',$message)";
				$query_run=mysqli_query($con,$query);
				$subject="Verification for Hell0.";
				mail($email,$subject,$message);

			}
		}
		else{
			$_SESSION['error']='field_error';
		}
	}
	$_SESSION['error'];
	header('location:index.php');
?>


