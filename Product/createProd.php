<?php 
session_start();
  if(!isset($_SESSION['userId'])) {
    header("Location: ../User/login.php");
  }

  if($_SESSION['role'] !== 'Manager') {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php include '../utils/db.php';

if(isset($_POST['Send'])) {
    $pName = trim($_POST['prodName']);
    $Brand = trim($_POST['brand']);
    $supplierPhone = trim($_POST['supplier-phone']);
    $supplier = trim($_POST['supplier']);
    $creator = trim($_SESSION['userId']);
    
    $sql = "INSERT IGNORE INTO stk_products(product_Name,brand,supplier_phone,supplier,creator) VALUES ('$pName','$Brand','$supplierPhone','$supplier','$creator')";
    $query = mysqli_query($connection,$sql);
    
    
     if($query) {
        header("Location: ../utils/viewProd.php");
     }

    }?>

