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

if(isset($_POST['update'])) {
    $prodId = $_POST['productId'];
    $prodName = $_POST['prodName'];
    $brand = $_POST['brand'];
    $suphone = $_POST['supplier-phone'];
    $supplier = $_POST['supplier'];
    
    
        $sql = "UPDATE stk_products SET product_Name='$prodName', brand='$brand', supplier_phone='$suphone', supplier='$supplier'  WHERE productId=$prodId";
        $query = mysqli_query($connection,$sql);
        
    
    ?>
    
    <?php 
    
    if($query) {
      header("Location: ../utils/viewProd.php");
      } else {
    echo mysqli_error($connection);
}

    }?>

<a href="../index.php">Go Back</a>


