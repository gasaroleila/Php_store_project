<?php 

 session_start();
  if(!isset($_SESSION['userId'])) {
      header("Location: ./login.php");
  }

?>

<style>
    table {
    border: 2px solid black;
    border-collapse: collapse;
}

td,th {
    border: 1px solid; 
}
</style>


<?php include '../utils/db.php';

if(isset($_POST['Send'])) {
    $currentPass = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $hashedNewPassword = hash('SHA512', $newPass);
    $hashedCurrentPassword = hash('SHA512', $currentPass);
    $confirmPassword = $_POST['confPass'];
    $userId = $_SESSION['userId'];
    $oldPassword = $_SESSION['password'];  
    

       if($hashedCurrentPassword === $oldPassword) {
         if($newPass === $confirmPassword) {
          $sql2 = "UPDATE stk_users SET password='$hashedNewPassword' WHERE userId= $userId";
          $query2 = mysqli_query($connection, $sql2);
          if(!$query2) {
              echo mysqli_error($connection);
          }else {
            header("Location: ../index.php");
          }
         }else {
          $_SESSION['Error'] = "Passwords don't match!";
          header("Location: ./changePassword.php");
         }
       }else {
        $_SESSION['Error'] = "Please Enter the old password!";
        header("Location: ./changePassword.php");
       }

      
      }

    ?>



