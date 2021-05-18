<?php include '../utils/db.php';
session_start();

$search = $_POST['search'];


$sql = "SELECT * from stk_users where username like '$search'";
$query = mysqli_query($connection,$sql);

if(mysqli_num_rows($query)<=0) {
    echo "No User Found!";
}else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>    
<table class="table table-bordered">
<tr>
               <th>FirstName</th>
               <th>LastName</th>
               <th>Email</th>
               <th>Telephone</th>
               <th>Gender</th>
               <th>Username</th>
               <?php  if($_SESSION['role'] === 'Administrator') {?>
               <th>Update User</th>
               <th>Delete User</th>
               <?php }?>
           </tr>

<?php
   while($row=mysqli_fetch_assoc($query)) {
    ?>
   
   <tr>
   <td><?=$row['firstName']?></td>
   <td><?=$row['lastName']?></td>
   <td><?=$row['email']?></td>
   <td><?=$row['telephone']?></td>
   <td><?=$row['gender']?></td>
   <td><?=$row['username']?></td>
   
   <?php  if($_SESSION['role'] === 'Administrator') {?>
   <td><a href="../User/useredit.php?userId='<?php echo $row['userId']?>'">update</a></td>
   <td><a href="../User/deleteUser.php?userId='<?php echo $row['userId']?>'">Delete</a></td>
   </tr>
   
   <?php  } ?>

<?php 
    }
} ?>


</table>

<a href="../utils/viewUser.php">Go Back</a>
</body>
</html>

