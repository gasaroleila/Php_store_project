<?php 
session_start();
  if(!isset($_SESSION['userId'])) {
    header("Location: ../User/login.php");
  }

  if($_SESSION['role'] !== 'Manager') {
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


<?php include '../utils/db.php';

$prodId = $_GET['prodId'];


$sql = "UPDATE stk_products SET Status='Disabled' WHERE productId=$prodId";
$query = mysqli_query($connection,$sql);
    

?>

<?php 

if($query) {
 header("Location: ../utils/viewProd.php");
 }else {
    echo mysqli_error($connection);
} ?>



