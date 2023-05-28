<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'mydb');

class DB_con{

    private $con;
   
  function __construct(){

     $this->con = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
      // Check connection
     if ($this->con->connect_error){
      echo "Failed to connect to MySQL: " . $this->con->connect_error;
     }else{
      return $this->con;
      }
    }
  
 public function insert($fname,$email,$pass,$rol){
     $stmt=$this->con->prepare("INSERT into users(name,email,password,role)values(?,?,?,?)");
    $stmt->bind_param("sssi",$fname,$email,$pass,$rol);
       if($stmt->execute()){
          return TRUE;
       }
}

 public function isUserexist($email,$pass){
   $stmt="SELECT id FROM users WHERE  email ='$email' && password ='$pass' ";
   $res=$this->con->query($stmt);
  return $res;

 }


public function chicklogin($email,$pass){
   $stmt="SELECT * FROM users WHERE email='$email' and password='$pass' ";
   $res=$this->con->query($stmt);
   return $res;
   }

    

 public function select(){
   $db_users = "SELECT *FROM users";
   $res=$this->con->query($db_users);
   return $res;
    
 }
 public function selectUeser(){
  $db_users = "SELECT *FROM users WHERE role='2'";
  $res=$this->con->query($db_users);
  return $res;
   
}
public function selectAdmin(){
  $db_users = "SELECT *FROM users WHERE role='1'";
  $res=$this->con->query($db_users);
  return $res;
   
}
 
 public function delete($userid){
   $delet_users = " DELETE FROM users WHERE id=$userid";
   $r=$this->con->query($delet_users);
   return $r ;
      
 } 

     //يرجع تسجيل واحد
   public function FetchRecord($id){
      $db_users = "SELECT *FROM users WHERE id='$id'";
      $res=$this->con->query($db_users);
      return $res;
       
    }
    
  public function updata($u,$e,$r,$id){
   
   $up_users = " UPDATE  users SET name='$u',email='$e',role='$r' WHERE id='$id'"; 
   $up=$this->con->query($up_users);
   return $up ;
      
   }  
   
   public function updataUeser($n,$e,$id){
    $up_users = " UPDATE  users SET name='$n',email='$e' WHERE id='$id'"; 
    $up=$this->con->query($up_users);
    return $up ;
       
    }
  public function updatapassword($p,$id){
      $up_pass = " UPDATE  users SET password='$p' WHERE id='$id'"; 
      $up=$this->con->query($up_pass);
      return $up ;
         
      }
 
  

}

?>