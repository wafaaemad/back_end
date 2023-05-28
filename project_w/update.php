<?php
session_start();
include_once("class.php");
$up = new DB_con();
$errors=[];

if($id= $_GET['id']){
  
	
  $sql=$up->FetchRecord($id);

  if($sql->num_rows>0){
   $admin= $sql->fetch_assoc();
   $name=$admin['name'];
   $email=$admin['email'];
   $password=$admin['password'];
   $role =$admin['role'];
   
    
  }
  
  
  
}
if(isset($_POST['update'])){

	$newN=$_POST['name'];
	$newE=$_POST['email'];
	$newrole=$_POST['type'];
	$id= $_GET['id'];
	
	$t=$up->updata($newN,$newE,$newrole,$id);
	 
 if($t){
  $_SESSION['s']=" <div class='scss'> Update completed successfully </div> ";
  
  header('location:page_admin.php');
   }
   

}

 

?>

<!DOCTYPE html>
<html>
  <head>
    <title>up date</title>
    <link rel="stylesheet" type="text/css" href="./style/w.css">
 </head>

<body>
  <header>
    <h class="logo">wafaa</h>
    <ul>
      <li><a href="login.php" class="home">wafaa</a></li>
      
    </ul>
  </header>

  <img class="wave" src="./img/w.svg">

</div>
<div>
 <?php if(isset($_SESSION['s']) ) {
        echo $_SESSION['s'];
        unset($_SESSION['s']);
       } ?>
</div>  

<div class="login">
      <div class="card-header">
           <h2> Up Date</h2>
       </div>

  <form method="post" action="#">
  	
  	<div class="input-group">
  	  
  	  <input type="text" name="name" required placeholder="Enter Name User" value="<?php echo $name ; ?>" >
  	</div>
  	<div class="input-group">
  	  
  	  <input type="email" name="email" required  placeholder="Enter Email" value="<?php echo $email ; ?>" >
  	</div>
    
    <div class="Gender">
      
      <label>Gender</label>
        <input class="show" type="radio" name="type"  value="1 "> Admin 
        <input class="show" type="radio" name="type"  value="2" > User
    </div>  
      <div>
      <?php if (count($errors) > 0) { ?>

      <ul class="error">
       <?php foreach ($errors as $error) { ?>
        <li> <?php echo $error;?></li>
       <?php  }  ?>
       </ul>
       <?php  }elseif(isset($_SESSION['s']) ) {
        echo $_SESSION['s'];
        unset($_SESSION['s']);
       }  ?>
      </div>
      
      <div class="button_user">
  	    <button type="submit" class="p" name="update"> Update </button>
        
        
  	  </div>
    
   </form>

  
  </div> 
  </div>
<div>
<footer > Wafaa Emad</footer>
</div>

 </body>
 
 

</html>