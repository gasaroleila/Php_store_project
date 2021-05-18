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

if(isset($_GET['OutId'])) {

$OutgoingId = $_GET['OutId'];


$sql = "DELETE FROM stk_outgoing WHERE outgoingId=$OutgoingId";
 $query = mysqli_query($connection,$sql);
    


if($query) {
  header("Location: ../utils/viewOutgoing.php");
 }
   } ?>


