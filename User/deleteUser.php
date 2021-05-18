<?php 
session_start();
  if(!isset($_SESSION['userId'])) {
      header("Location: ./login.php");
  }

  if($_SESSION['role'] !== 'Administrator') {
    header("Location: ../index.php");
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

<!-- change status to disabled -->

<?php include '../utils/db.php';

$userId = $_GET['userId'];

if(!$connection) {
    echo "ERROR". mysqli_connect_error();
}else {
    $sql = "UPDATE stk_users SET Status='Disabled' WHERE userId=$userId";
    $query = mysqli_query($connection,$sql);
    
}

?>

<?php 

if($query) {
  header("Location: ../utils/viewUser.php");
 }else {
     echo "failed!";
 } ?>

