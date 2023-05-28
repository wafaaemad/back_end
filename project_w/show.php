<?php
session_start();
include_once("class.php");
 $show = new DB_con();
 
 if(isset($_GET['id'])&&!empty($_GET['id'])){

 $dd= $_GET['id'];
 $sql=$show->FetchRecord($dd);
 
 if($sql->num_rows>0){
  $row=$sql->fetch_assoc();
  $id=$row["id"];
  $n =$row["name"];
  $e =$row["email"];
  $r =$row["role"];
  $time =$row["created_at"];
  if($r==1){
    $role="Admain";
  }else{
    $role="Ueser";
  }

  $_SESSION["user_name"]=$n;
 }
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
      
    </ul>
  </header>
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
        <p> <?php echo  $role ; ?></p>
      </div>
      <div class="view">
        <h4> Login time is : </h4>
        <p> <?php echo  $time; ?></p>
      </div>
      
     <div class="button_user">
     <a class='w1' href='page_admin.php'> back</a>
     <a class='w1' href='logout.php'> Logout</a>

     </div>

   </div>
     
   <div>
<footer > Wafaa Emad</footer>
</div>

  
</body>
</html>