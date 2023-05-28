<?php
session_start();
include_once("class.php");
$show = new DB_con();
$user_id=$_SESSION["user_id"];
if(isset($user_id)){
 $sql=$show->FetchRecord($user_id);
 if($sql->num_rows>0){
  $row=$sql->fetch_assoc();
  $n=$row["name"];}
  
 }else{
  header('location:login.php');
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="./style/w.css">
     
    <title>Hello, world!</title>
  </head>


  <body>
  
  <header class="hed">
    <h class="logo"> wafaa  </h>
    <div class="dropdown">
     
          <ul>
          <li><a href="profile.php" > profile </a></li>
            <li><a href="logout.php">Login Out</a></li>
            <li><a href="regest.php" > Add Users </a></li>
          </ul>
      
</div>         
  </header>
  
  <div > <?php 

    if(isset($_SESSION["w"]) ){
      echo  $_SESSION["w"];

      unset($_SESSION["w"]);
    }?>
      
   </div>  
<div >
  
   <table border="2">
    
      <thead>
        <tr>
           <th>ID</th>
           <th> Name</th>
           <th>Email</th>
           <th> user_type </th>
           <th> Created_at </th>
           <th> Oprition </th>
        </tr>
      </thead>
     <tbody>
       
     <tr>
     <?php	
         $selctdata=new DB_con();
        $select=$selctdata->select();
     while ($row=$select->fetch_assoc()) { 
       
       
      ?>
        
        <th><?php echo $row['id']?></th>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['role']?></td>
        <td><?php echo $row['created_at']?></td>

        
        <td > <a class='w1' href='update.php?id=<?php  echo $row['id'];?>'> Update</a>
             <a class='w2' onClick= 'return checkdelete()' href='delete.php?id= <?php  echo $row['id'];?> ' > Delete </a>
             <a class='w1'  href='show.php?id=<?php echo $row['id']; ?> '> Viwe</a> 
             <a class='w1' href='change_pass.php?id=<?php  echo $row['id']; $_SESSION['page']=1;?>'> change Password </a></td>
      
      </tr>
        
      <?php	}  ?>
      
      
      
              
      </tr>
      
      
    </tbody>
    
  </table>
  
    
<script>
      function  checkdelete(){
      return confirm("Are you sure you want to delete?");
       }
</script>
  
<div>
<footer class="foot"> Wafaa Emad</footer>
</div>         
  </body>
  
</html>
