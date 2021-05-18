<?php include '../utils/db.php';
session_start();
if(isset($_POST['Send'])) {
  setcookie("TestCookie", "some value", time()+60, "/");
 $username = trim($_POST['usname']);
 $password =  trim($_POST['pass']);
 $hashed = hash('SHA512',$password);
   
   
 $sql="SELECT su.userId,su.firstName, su.lastName,su.gender,su.telephone,su.email,su.username,su.password,r.roleId,r.roleName from stk_users su INNER JOIN roles r ON su.roleId=r.roleId WHERE su.username='$username' AND su.password='$hashed'";
 $query = mysqli_query($connection,$sql);


   if($query && mysqli_num_rows($query) > 0) {
      while(list($userId,$firstName,$lastName,$gender,$telephone,$email,$username,$password,$roleId,$role)=mysqli_fetch_array($query)) {
          $_SESSION['userId'] =  $userId;
          $_SESSION['role'] =  $role;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
      }

        header("Location: ./details.php");
    }
    
    if(mysqli_num_rows($query)==0) {
      $_SESSION['Error'] = "Invalid username or password";
      header("Location: ./login.php");
    }
     
       
   }else {
  header("Location: ./login.php");
}?>    
