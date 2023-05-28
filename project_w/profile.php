<?php
session_start();
include_once("class.php");
$number=new DB_con();
$sql=$number->select();
 $numM=$sql->num_rows;

 $sql=$number->selectUeser();
 $numU=$sql->num_rows;

 $sql=$number->selectAdmin();
 $numA=$sql->num_rows;
  
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
            <li><a href="regest.php" class="home" > profile </a></li>
            <li><a href="logout.php">Login Out</a></li>
            <li><a href="regest.php" > Add Users </a></li>
          </ul>
      
</div>         
  </header>
  
   

   <div class="show1">
    <div class="num">
        <h> Number Member  </h>
        <h3><?php  echo $numM ?></h3>
    </div>
    <div class="num">
        <h> Number Ueser </h>
        <h3><?php  echo $numU ?></h3>
    </div>
    <div class="num">
        <h> Number Admin  </h>
        <h3><?php  echo $numA ?></h3>
    </div>
   

   </div>
<div class="row">
  
   <table border="3" >
    
      <thead>
        <tr>
           <th>ID</th>
           <th> Name</th>
           <th>Email</th>
           <th> user_type </th>
           <th> Created_at </th>
           
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
        </tr>

      <?php	}  ?>
      
      
      
              
      </tr>
      
      
    </tbody>
    
  </table>

  
<div>
<footer class="foot"> Wafaa Emad</footer>
</div>         
  </body>
  
</html>
