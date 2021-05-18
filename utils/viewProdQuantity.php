<?php 
 session_start();
 if(!isset($_SESSION['userId'])) {
    header("Location: ../User/login.php");
 }
?>
<table>
           <tr>
               
               <th>Product Name</th>
               <th>Quantity</th>
           </tr>

<?php include '../utils/db.php';
$sql = "SELECT * FROM stk_products";
$query = mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($query)) {
 ?>

<tr>
<td><?=$row['product_Name']?></td>
<td><?=$row['brand']?></td>
<td><?=$row['supplier_phone']?></td>
<td><?=$row['supplier']?></td>
<td><a href="prodedit.php?prodId='<?php echo $row['productId']?>'">update</a></td>
<td><a href="deleteProd.php?prodId='<?php echo $row['productId']?>'">Delete</a></td>
</tr>

<?php } ?>



</table>
<a href="../index.php">Go Back</a>
