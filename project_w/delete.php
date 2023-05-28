<?php
    include_once("class.php");

    if(isset($_GET['id'])){
      $dd= $_GET['id'];
      $delet_user=new DB_con();
      $delet=$delet_user->delete($dd);
      
      if($delet){

        $_SESSION['s'] ="<div class='session'> delete completed successfully </div> ";
       
        header('location:page_admin.php');
     }
    
    exit;
      
    }
?>

