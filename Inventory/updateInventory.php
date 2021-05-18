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

if(isset($_POST['update'])) {
   $quantity = $_POST['qty'];
   $InventoryId = $_POST['InventoryId'];
    
    
    $sql = "UPDATE stk_inventory SET quantity='$quantity'  WHERE inventory_id=$InventoryId";
    $query = mysqli_query($connection,$sql);
    
    if($query) {
      header("Location: ../utils/viewInventory.php");
    }else {
    echo mysqli_error($connection);
}

    }?>





