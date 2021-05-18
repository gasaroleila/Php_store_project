<?php 
 session_start();
 if(!isset($_SESSION['userId'])) {
  header("Location: ../User/login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
<style>
  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
  }
  body {
    font-family: 'Graphik'
  }

  .main {
    height: 134vh;
   }
  nav {
  width: 100%;
  height:5%;
  display: flex;
  background-color: #6c63ff;
  justify-content: space-between;
}

/* nav > ul{
 
  display: flex;
    width: 48%;
    margin-top: 1%;
}
li{
  width: 5%; 
}

ul li a {
  text-decoration: none!important;
  color: white;
  text-transform: uppercase;
  font-size: 0.8em;
  font-weight: 700;
}


ul li {
  display: inline-block;
  margin: 0 2em;
}

nav label {
  font-size: 2em;
  color: white;
  width: 20%!important;
  margin-left: 2em;
  margin-top: 1px
} */

table {
        width: 80%!important;   
        height: 80%;
        margin: 4em auto
         }

    table a {
        color: #4f38f7!important
    }

</style>
</head>

<body>
<div class="main">
<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-color: #6c63ff!important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white; text-transform: uppercase;">G-store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <?php if($_SESSION['role'] == 'Manager') {?>
            <li><a class="dropdown-item" href="../Product/home.php">Create a Product</a></li>
              <?php }?>
            <li><a class="dropdown-item" href="./viewProd.php">View Products</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <?php if($_SESSION['role']== 'Administrator') { ?>
            <li><a class="dropdown-item" href="../User/home.php">Create a User</a></li>
            <li><a class="dropdown-item" href="../User/details.php">View Details</a></li>
               <?php }?>
            <li><a class="dropdown-item" href="./viewUser.php">View Users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Outgoing
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../Outgoing/home.php">Register Outgoing</a></li>
            <li><a class="dropdown-item" href="./viewOutgoing.php">View Outgoing</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../Inventory/home.php">Add to Inventory</a></li>
            <li><a class="dropdown-item" href="./viewInventory.php">View Inventory</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../User/logout.php">Log Out</a></li>
            <li><a class="dropdown-item" href="../User/useredit.php?userId='<?php echo $_SESSION['userId']?>'">Edit Profile</a></li>
            <li><a class="dropdown-item" href="../User/changePassword.php">Reset Password</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>



<div class="container">
  <form action="../User/searchUser.php" method="post">
    <input type="search" name="search" id="search" placeholder="Search By Username">
</form>
<table class="table table-bordered">
           <tr>
               <th>FirstName</th>
               <th>LastName</th>
               <th>Email</th>
               <th>Telephone</th>
               <th>Gender</th>
               <th>Nationality</th>
               <th>Username</th>
               <?php  if($_SESSION['role'] === 'Administrator') {?>
               <th>Update User</th>
               <th>Delete User</th>
               <?php }?>
           </tr>

<?php include '../utils/db.php';
$sql = "SELECT su.userId,su.firstName,su.lastName,su.email,su.telephone,su.gender,su.nationality,su.username, c.countryName FROM stk_users su INNER JOIN countries c ON su.nationality = c.countryId WHERE su.Status='Active'";
$query = mysqli_query($connection,$sql);

while($row=mysqli_fetch_assoc($query)) {
 ?>

<tr>
<td><?=$row['firstName']?></td>
<td><?=$row['lastName']?></td>
<td><?=$row['email']?></td>
<td><?=$row['telephone']?></td>
<td><?=$row['gender']?></td>
<td><?=$row['countryName']?></td>
<td><?=$row['username']?></td>

<?php  if($_SESSION['role'] === 'Administrator') {?>
<td><a href="../User/useredit.php?userId='<?php echo $row['userId']?>'">update</a></td>
<td><a href="../User/deleteUser.php?userId='<?php echo $row['userId']?>'">Delete</a></td>
</tr>

<?php  }} ?>

</table>
<a href="../index.php">Go Back</a>



</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>