<?php
session_start();
include_once("class.php");
$errors=[];
$pass = new DB_con();
if(isset($_GET['id'])){
  $dd= $_GET['id'];

 if(isset($_POST['sub'])){

  $sql=$pass->FetchRecord($dd);
  $user= $sql->fetch_assoc();
  $old_pass=$user['password'];

    $previous_pass = md5($_POST['previous_pass']);
    $new_pass = md5($_POST['new_pass']);
    $confirm_pass = md5($_POST['confirm_pass']);
 
    if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($previous_pass != $old_pass){
        $errors[] = 'old password not matched!';
       }elseif($new_pass != $confirm_pass){
        $errors[] = 'confirm password not matched!';
       }else{
        $t=$pass->updatapassword($new_pass,$dd);
        
        $_SESSION["w"]=" <div class='session'>Password has been updated successfully</div>";
        $page= $_SESSION["page"];
         if($page==1){
          header('location:page_admin.php');
         }elseif($page==2){
          header('location:page_user.php');
         }
         
        
       } 
 }
 
 }
}else{
  header('location:login.php');
}
  ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="./style/w.css">
 </head>

<body>
  <header>
    <h class="logo">wafaa</h>
    <ul>
      <li><a href="login.php" class="home">Login in</a></li>
      
    </ul>
  </header>

  <img class="wave" src="./img/w.svg">

</div>
<div class="login">
      <div class="card-header">
           <h3 > Change Password</h3>
           
       </div>

  <form method="post" action="#">
  	
  	<div class="input-group"> 
  	  <input type="password" name="previous_pass" placeholder="enter previous password"  >
  	</div>

  	<div class="input-group">
  	  <input type="password" name="new_pass"  placeholder="enter new password"  >
  	</div>

    <div class="input-group">
  	  <input type="password" name="confirm_pass"  placeholder="confirm new password" >
  	</div>

   
    <div class="input-group">
      <?php if (count($errors) > 0) { ?>

       <ul class="error">
        <?php foreach ($errors as $error) { ?>
         <li> <?php echo $error;  ?></li>
         <?php  } ?>
        </ul>
        <?php  } ?>
    </div>

      
      
      
      
      <div>
  	    <button type="submit" class="p" name="sub"> Change Password </button>
  	  </div>
    
   </form>

  </div>
  
   
     <div>
       <footer > Wafaa Emad</footer>
     </div>

 </body>
</html>