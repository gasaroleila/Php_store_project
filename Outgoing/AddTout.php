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
    
    $sql = "SELECT quantity FROM  stk_inventory WHERE productId='$pId' ";
    $queryA = mysqli_query($connection, $sql);
    $rowA = mysqli_fetch_assoc($queryA);

    if(!$queryA) {
        echo mysqli_error($connection);
    }

    if($queryA && mysqli_num_rows($queryA)>0) {

    if($quantity<=$rowA['quantity']) {
    $sql = "INSERT IGNORE INTO stk_outgoing(productId,quantity,creator) VALUES ('$pId','$quantity','$creator')";
    $query = mysqli_query($connection,$sql);
        
    
    if($query) {
        header("Location: ../utils/viewOutgoing.php");
     }

    }else {
        $_SESSION['Error'] = "The available quantity is not enough! ";
        header("./home.php");
    }

    }

}


     
     ?>    

 
