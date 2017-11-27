<?php
	ob_start();
	session_start();
	require 'library/resources/database.php';

		if(isset($_POST['username'])&&isset($_POST['password'])){

		if(!empty($_POST['username'])&&!empty($_POST['password'])){

			$username=$_POST['username'];
			$password=md5($_POST['password']);	

			$search="SELECT id, name, email, username, code, activated, admin, hits, online FROM credentials WHERE username='$username' AND password='$password'" ;
			$search_run=mysqli_query($con,$search);
			$result=mysqli_num_rows($search_run);

			if($result==0){
				$_SESSION['error']='login_error';
			}
			else{
				$info=mysqli_fetch_assoc($search_run);
				setcookie('cookie-id',$info['id'],time()+900);
				$first=str_word_count($info['name'],1,'?');
				setcookie('cookie-name',$first[0],time()+900);
				setcookie('cookie-code',$info['code'],time()+900);
				setcookie('cookie-activated',$info['activated'],time()+900);
				setcookie('cookie-admin',$info['admin'],time()+900);
				$hits=$info['hits'];
				$hits++;
				$update="UPDATE credentials SET hits='$hits', online=1 WHERE username='$username'";
				mysqli_query($con,$update);
			}
		}
		else{
			$_SESSION['error']='field_error';
		}
	}
	else{
		echo $temp_id=$_COOKIE['cookie-id'];
		setcookie('cookie-id',$info['id'],time()-900);
		setcookie('cookie-name',$first[0],time()-900);
		setcookie('cookie-code',$info['code'],time()-900);
		setcookie('cookie-activated',$info['activated'],time()-900);	
		setcookie('cookie-admin',$info['admin'],time()-900);	
		setcookie('cookie-hits',$info['hits'],time()-900);
		$update="UPDATE credentials SET online=0 WHERE id='$temp_id'";
		mysqli_query($con,$update);		
	}
	echo $_SESSION['error'];
	header('location:index.php');

?>	

