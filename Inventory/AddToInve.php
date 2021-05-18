<?php 
  session_start();
  if(!isset($_SESSION['userId'])) {
      header("Location: ../User/login.php");
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
    $pId = $_POST['prodId'];
    $quantity = $_POST['qty'];
    $creator = $_SESSION['username'];

    $sql = "INSERT IGNORE INTO stk_inventory(productId,quantity,creator) VALUES ('$pId','$quantity','$creator')";
    $query = mysqli_query($connection,$sql);
        
    
    if($query) {
        header("Location: ../utils/viewInventory.php");
     }

    }

     
     ?>    

 
