<?php
session_start();
include_once("class.php");
$upuser = new DB_con();
$errors=[];
if($id= $_GET['id']){

$sql=$upuser->FetchRecord($id);

  if($sql->num_rows>0){
   $user= $sql->fetch_assoc();
   $name=$user['name'];
   $email=$user['email'];
    
  }
  
}

if(isset($_POST['sub'])){

	$newN=$_POST['name'];
	$newE=$_POST['email'];
	$id= $_GET['id'];
	
	$t=$upuser->updataUeser($newN,$newE,$id);
if($t){
    $_SESSION['s']=" <div class='session'> Update completed successfully. </div>";
    header('location:page_user.php');
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

  <div > <?php 
    if(isset($_SESSION['up']) ){
      echo  $_SESSION['up'] ;
      unset($_SESSION['up']);
    }
  
  ?>
</div>
<img class="wave" src="./img/w.svg">

<div class="login">
      <div class="card-header">
           <h4 > UpDate</h4>
           
       </div>

  <form method="post" action="#">
  	
  	<div class="input-group">
  	  
  	  <input type="text" name="name" placeholder="Name User" value="<?php echo $name ; ?>" >
  	</div>
  	<div class="input-group">
  	  
  	  <input type="email" name="email"  placeholder="Email" value="<?php echo $email ; ?>"  >
  	</div>
       <div class="button_user">
  	    <button type="submit" class="p" name="sub"> Update </button>
        
  	  </div>
    
   </form>

  </div>
  </div> 
<div>
<footer > Wafaa Emad</footer>
</div>

 </body>
 
 

</html>