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
   $outgoingId = $_POST['outgoingId'];

  $sql = "UPDATE stk_outgoing SET quantity='$quantity'  WHERE outgoingId=$outgoingId";
  $query = mysqli_query($connection,$sql);
    
    ?>
    
    <?php 
    
    if($query) {
      header("Location: ../utils/viewOutgoing.php");  
     }else {
    echo mysqli_error($connection);
 }

    }?>


