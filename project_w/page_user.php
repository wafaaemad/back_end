<?php
session_start();
include_once("class.php");
 $show = new DB_con();
 
 $user_id=$_SESSION["user_id"];
 if(isset($user_id)){
  $sql=$show->FetchRecord($user_id);
  if($sql->num_rows>0){
   $row=$sql->fetch_assoc();
   $id=$row["id"];
   $n =$row["name"];
   $e =$row["email"];
   $time=$row["created_at"];
    $_SESSION["user_name"]=$n;
   
   
  }
 } else{
  header('location:login.php');
 }

 
    
  ?>
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/w.css">

    <title>Show Users</title>
</head>
<body>

<header>
<h class="logo"> wafaa  </h>
    <ul>
      
      <li><a href="login.php" class="home">Login in</a></li>
      <li><a href="profile.php" > profile </a></li>
    </ul>
  </header>
  <div > <?php 

    if(isset($_SESSION['s']) ){
      echo  $_SESSION['s'] ;
      unset($_SESSION['s']);
    }?>
      
   </div>  
   <img class="wave" src="./img/w.svg">
   <div class="contener">
     
      <div class="card-header">
      <img  class="img_user" src="./img/img2.jpg">
           <h3> Welcome ..  <span><?php echo ucfirst( $_SESSION["user_name"] ); ?></span></h3>
           
          
      </div>
      <div class="view">
        <h4> The name is : </h4>
        <p> <?php echo $n ; ?></p>
      </div>
      <div class="view">
        <h4> The Email is : </h4>
        <p> <?php echo  $e ; ?></p>
      </div>
      
      <div class="view">
        <h4> user_type : </h4>
        <p> Ueser</p>
      </div>
      <div class="view">
        <h4> Login time is : </h4>
        <p> <?php echo  $time ; ?></p>
      </div>
      
     <div class="button_user">
     <a class='w1' href='updateUser.php?id=<?php  echo $row["id"];?>'> Update</a>
     <a class='w1' href='change_pass.php?id=<?php  echo $row["id"];$_SESSION["page"]=2;?>'> change Password</a>
     <a class='w1' href='logout.php'> Logout</a>

     </div>

   </div>
     
   <div>
<footer > Wafaa Emad</footer>
</div>

  
</body>
</html>