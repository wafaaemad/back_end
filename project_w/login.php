<?php
session_start();
include_once("class.php");
 $chick = new DB_con();
 $errors=[];


   if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $password =md5($_POST['password']);

    $sql=$chick->chicklogin($email,$password);
   
    if ($sql->num_rows>0){

       $row=$sql->fetch_assoc();
       if($row['role'] == 1){
        $_SESSION["user_id"]= $row['id'];
        $n=$row['name'];
        $_SESSION['w']=" <div class='wel'> Welcome Admin  $n .</div>";
         header('location:page_admin.php');

     }elseif($row['role'] == 2){
      
      $_SESSION["login_sess"]="1"; 
      $_SESSION["user_id"]= $row['id'];
      
        header('location:page_user.php');

     }
    
  }else{
     $errors[] = 'incorrect email or password!';
  }
     



   
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="./style/w.css">
    <title>Document</title>
 </head>
 <body>
  <header>
  <h class="logo"> wafaa  </h>
    <ul>
      <li><a href="login.php"  class="home">login in</a></li>
    </ul>
  </header>
  <img class="wave" src="./img/w.svg">


  <div class="login"> 

  	<h2>Login</h2>
  
   <form action="" method="post">
   
      <div class="input-group">
       <input type="email" name="email" placeholder="Email" required>
      </div>


      <div class="input-group">    
  		<input type="password" name="password"required placeholder="Password">
      
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

       
      
	<div class="input-group">
  		<button type="submit" class="p" name="submit">Login</button>
  	</div>
    
  		<p class="rem">Not yet a member? 
      <a href="regest.php">Sign up</a> </p>
  

     
     </form>
   
  </div> 

  </div>
  


<div>
<footer> Wafaa Emad</footer>
</div>
 </body>
 
 </html>