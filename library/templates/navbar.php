<?php
  if(is_null($_COOKIE['cookie-id'])){
        $status='disabled';
        $link = array('lab' => '#','assign'=> '#','feed'=> '#' );               
      }
      else{
        $status=' ';
        $link = array('lab' => 'labreports.php','assign'=>'assignments.php', 'tut'=>'tutorials.php', 'feed'=> 'cpanel.php' );
      }
?>

<nav class="navbar navbar-toggleable-lg navbar-light">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-bars" aria-hidden="true" style="color: #fff";></i>
  </button>
  <p class="navbar-brand" style="color: #fff"; >HELL-0&nbsp&nbsp</p>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul id="for-center" class="navbar-nav mr-auto">      
      <li class="active nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> </a>
      </li>
      <?php
        if(!is_null($_COOKIE['cookie-id'])){
      ?>
      <li class="nav-item">
        <a class="<?php echo $status;?> nav-link" href="<?php echo $link['lab']?>"><i class="fa fa-gitlab" aria-hidden="true"></i> LAB REPORTS</a>
      </li>
      <li class="nav-item">
        <a class="<?php echo $status;?> nav-link" href="<?php echo $link['assign']?>"><i class="fa fa-gears" aria-hidden="true"></i> ASSIGNMENTS</a>
      </li>
      <li class="nav-item">
        <a class="<?php echo $status;?> nav-link" href="<?php echo $link['tut']?>"><i class="fa fa-send" aria-hidden="true"></i> TUTORIALS</a>
      </li>
      <li class="nav-item">
        <a class="<?php echo $status;?> nav-link" href="<?php echo $link['feed']?>"><i class="fa fa-rss" aria-hidden="true"></i> ADMIN</a>
      </li>	    
      <?php
        }
      ?>  	      	      
    </ul>

<?php
    if(is_null($_COOKIE['cookie-id'])){
?>

  <form action="././auth.php" method="POST">
	  <ul id="signin" style="text-align: center; padding: 0px;">
	    <li><input id="little" class="form-control mr-sm-2" type="text" placeholder="Username" name="username"></li>
	    <li><input id="little" class="form-control mr-sm-2" type="password" placeholder="Password" name="password"></li>
	    <li><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Signin</button></li>
	  </ul>  
  </form>

<?php
  }
  else{
?>  

  <form action="././auth.php" method="POST">
    <ul id="signin" style="text-align: center; padding: 0px;">
      <li><button class="btn btn-primary my-2 my-sm-0" disabled>Hello! <?php echo $_COOKIE['cookie-name']?></button></li>
      <li><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Signout</button></li>
    </ul> 
  </form> 

<?php
  }
?>
  </div>
</nav>