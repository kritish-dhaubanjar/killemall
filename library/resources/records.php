<?php

	// $records = "SELECT lab_id FROM records WHERE uid='$id' ";		

	// $com_query=mysqli_query($con,$records); // Completed Works from "records"

	// $complete = array();
	// $i=0;
	// 	while($list=mysqli_fetch_assoc($com_query)){
	// 		$complete[$i]=$list['lab_id']; //Completed Work id from "records"
	// 		$i++;
	// 	}

	// 	if($i!=0)
	// 		$imp= '('. implode(',', $complete). ')';
	// 	else{
	// 		$imp= '(0)';
	// 	}

 	//$labreports="SELECT id, title, acronym, sn, link FROM labreports WHERE id NOT IN $imp ORDER BY id DESC";

	// $query=mysqli_query($con,$labreports);
	#Array ( [id] => 2 [title] => [acronym] => MP [sn] => 2 [link] => http://localhost/ACME/acme-free/ )
	
	include_once 'database.php';
	$id=$_SESSION['cookie-id'];										//	userid

	function all_in_one($record_table, $column, $category, $id){ 
		global $con;
		$records = "SELECT ".$column." FROM ".$record_table." WHERE uid='$id' ";	
		$com_query=mysqli_query($con,$records);
		$complete = array();
		$i=0;

		while($list=mysqli_fetch_assoc($com_query)){
			$complete[$i]=$list[$column]; //Completed Work id from "records"
			$i++;
		}

		if($i!=0)
			$implode = '('. implode(',', $complete). ')';
		else{
			$implode = '(0)';
		}	
		$_query_="SELECT id, title, acronym, sn, link FROM ".$category." WHERE id NOT IN $implode ORDER BY id DESC";
		$query=mysqli_query($con,$_query_);
		return $query;
	}
?>

<?php
	function update_records($record_table, $column, $column_data){
		global $con,$id;
		$insert_query="INSERT INTO ".$record_table."(`uid`, `".$column."`) VALUES ('$id','".$column_data."')";
		mysqli_query($con,$insert_query);
		header('location:index.php');
	}

	if(isset($_GET['lab-id'])){
		$lab_id=$_GET['lab-id'];
		update_records('lab_records','lab_id',$lab_id);
	}else if(isset($_GET['assign-id'])){
		$assign_id=$_GET['assign-id'];
		update_records('assign_records','assign_id',$assign_id);	
	}else if(isset($_GET['tut-id'])){
		$tut_id=$_GET['tut-id'];
		update_records('tut_records','tut_id',$tut_id);	
	}
?>

<div class="container-fluid jumbotron" style="background-color:transparent; margin-bottom: 0px;">
  	<h1 class="display-4 text-center">Your Remaining Tasks!</h1>
  	<p class="lead text-center">Please <button type="button" class="btn btn-secondary btn-sm">Check</button> after you complete your task.</p>
  <hr class="my-4">

<div class="row" style="padding-top:15px ; padding-bottom: 17px; background-color: rgba(0,0,0,0.55); min-height: 400px;" >

	<div class="col-md-4">
		<h1 class="display-5">
		Lab Reports
		</h1>
		<hr class="my-4" style="border: solid 1px;">
		
	<?php
		$query = all_in_one('lab_records','lab_id','labreports', $id);
		while($list=mysqli_fetch_assoc($query)){
	?>	
		<form action="index.php" method="GET">
			<p><b>
			&nbsp<?php echo $list['title']; ?>&nbsp&nbsp
			<?php echo $list['sn'];?>
				<button type="submit" class="btn btn-secondary btn-sm">Check</button>
				<input hidden name="lab-id" value="<?php echo $list['id']; ?>">
			</b></p>
		</form>
	<?php	
		}
	?>	
	</div>

	<div class="col-md-4">
		<h1 class="display-5">
		Assignments
		</h1>
		<hr class="my-4" style="border: solid 1px;">
		
	<?php
		$query = all_in_one('assign_records','assign_id','assignments', $id);
		while($list=mysqli_fetch_assoc($query)){
	?>	
		<form action="index.php" method="GET">
			<p><b>
			&nbsp<?php echo $list['title']; ?>&nbsp&nbsp
			<?php echo $list['sn'];?>
				<button type="submit" class="btn btn-secondary btn-sm">Check</button>
				<input hidden name="assign-id" value="<?php echo $list['id']; ?>">
			</b></p>
		</form>
	<?php	
		}
	?>	
	</div>


	<div class="col-md-4">
		<h1 class="display-5">
		Tutorials
		</h1>
		<hr class="my-4" style="border: solid 1px;">
	<?php
		$query = all_in_one('tut_records','tut_id','tutorials', $id);
		while($list=mysqli_fetch_assoc($query)){
	?>	
		<form action="index.php" method="GET">
			<p><b>
			&nbsp<?php echo $list['title']; ?>&nbsp&nbsp
			<?php echo $list['sn'];?>
				<button type="submit" class="btn btn-secondary btn-sm">Check</button>
				<input hidden name="tut-id" value="<?php echo $list['id']; ?>">
			</b></p>
		</form>
	<?php	
		}
	?>	
	</div>	
</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Jyashaa -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7709647602055524"
     data-ad-slot="5149042378"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>