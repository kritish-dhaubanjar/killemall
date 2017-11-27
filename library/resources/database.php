<?php

	function connect($server,$user,$pass,$database){
		$con=mysqli_connect($server,$user,$pass,$database) or die('Cannot connect to the database!!');
		return $con;
	}

	$server='localhost';
	$username='root';
	$password='toor';
	$database='hell-0';

	$con=connect($server,$username,$password,$database);
	
?>
