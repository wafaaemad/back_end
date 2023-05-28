<?php
session_start();
include_once("class.php");
$insertdata=new DB_con();
$errors=[];
if(isset($_POST['submit']))
{
   
 
 $name= $_POST['name'];
 $pass= $_POST['password'] ;
 $email= $_POST['email'];
 $pass_2=md5($_POST['password_2'])  ;
 $role= $_POST['type'] ;

 if(strlen($pass)<5){
     $errors[]='Password is weak';
   }
if(strlen($pass)>11){
    $errors[]='Password must be lest then 11 ';
  }
  $pass1= md5($_POST['password']) ;
if($pass1!=$pass_2){
    $errors[]='password not matched!';
     }

    $exist =$insertdata->isUserexist($email,$pass1);
    if ($exist->num_rows>0){
      $errors[]='user already exist!';
    }
   if(empty($errors)) {

    $sql=$insertdata->insert($name,$email,$pass1,$role);
    if($sql)
    {
      $_SESSION['admin']="<div class='scss'>Login completed successfully. </div>";
      
    }
    
     
   }


 }

 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="./style/w.css">
 </head>

<body>
<header>
<h class="logo"> wafaa  </h>
    <ul>
      
      <li><a href="login.php" class="home">Login in</a></li>
      
    </ul>
  </header>
  
</div>
<img class="wave" src="./img/w.svg">

  <div class="login">

  	<h2>Register</h2>
  
	
  <form method="post" action="#">
  	<div class="input-group">
  	  <input type="text" name="name" placeholder="User name" required>
  	</div>

  	<div class="input-group">
  	  <input type="email" name="email" placeholder="Email" required >
  	</div>

  	<div class="input-group">
  	  <input type="password" name="password" placeholder="Password" required>
  	</div>

  	<div class="input-group">
  	     <input type="password" name="password_2" placeholder="Confirm password" required>
  	</div>

    <div class="Gender">
      
      <label>Gender</label>
        <input class="show" type="radio" name="type" value="1"required > Admin 
        <input class="show" type="radio" name="type" value="2" required> User
    </div>  
    
    <div>
      <?php if (count($errors) > 0) { ?>

      <ul class="error">
       <?php foreach ($errors as $error) { ?>
        <li> <?php echo $error;?></li>
       <?php  }  ?>
       </ul>
       <?php  }elseif(isset($_SESSION['admin']) ) {
        echo $_SESSION['admin'];
        unset($_SESSION['admin']);
       } ?>
      </div>
      <div>
      
   
  	  <button type="submit" class="p" name="submit">Register</button>
  	</div>
    <p class="rem">Already have an account? <a href="login.php">login now</a></p>
  	
  </form>
  </div>
  <footer > Wafaa Emad</footer>
</body>
</html>