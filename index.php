
<?php 
 session_start();
 if(!isset($_SESSION['userId'])) {
     header("Location: ./User/login.php");
 }

 if(isset($_COOKIE['TestCookie'])) {
 echo $_COOKIE['TestCookie'];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
 * {
   margin: 0 ;
   padding: 0;
   box-sizing: border-box;
 }
  body {
    font-family: 'Graphik'
  }
   /* label {
     color: #18243c;
     font-size: 1em;
     width: 100%;
     display: inline-block;
   }

   a {
    display: block;
    margin-left: 23em;
    margin-top: 1em;
 } */

   .main {
    height: 134vh;
   }

   .main h1 {
    /* margin: 0 auto; */
    width: 100%;
    height: 1em;
    /* text-align: center; */
}

form {
    width: 91%;
    padding: 20px;
    height: 100%;
    margin: auto;
    /* color: #aeb0b2; */
    /* margin-bottom: 5em; */
    /* border-radius: 2em; */
}



   input[type="text"],input[type=email],input[type=tel],select, input[type="password"] {
     width: 65%;
     height: 43%;
     border-radius: 4px;
     padding:  4px 0px 4px 10px;
     border: 1px solid #18243c;
     margin: 10px 0px;
   }

   input#photo {
    width: 17em;
}

input[type="radio"]>label {
  width: 20px
}

.row {
    margin: 10px 0;
    height: 9%;
}

   .inside {
     display: inline-block;
     height: 2em;
     width: 2em;
   }

   input[type=submit] {
     background-color: #6c63ff;
     color: white;
     font-size: 1em;
     border: 2px solid white;
     width: 7em;
     height: 2em;
   }

   .footer {
    background-color: grey;
    width: 100%;
    height: 15%;
    margin: auto;
   }


@media screen and (max-width:390px) {

  label {
    width: 30%;
  }

  label.gender {
    width: 19em;
}

  input[type="text"],input[type=email],input[type=tel] {
    width: 93%;
  }


  input#photo {
    width: 6.6em;
}


  form {
    width: 86%;
    margin: 0 auto;
  }

  .main h1 {
    width: 38%;
  }
}

@media screen and (min-width:390px) and (max-width:770px) {
   form {
     width: 82%;
   }

   .main h1 {
     width: 32%;
   }
}



@media screen and (min-width:1290px) {
  input[type="text"],input[type=email],input[type=tel],select, input[type="password"] {
    width: 57%;
  }

}

footer {
  background-color: grey;
  width: 100%;
  height: 15%;
}

.special {
  width: 5em;
}


.search{
  height: 3%;
  background: none;
}
.search > input[type="text"]{
  border: 2px solid black;
}
/* #3e3d61 */


.stats {
  width: 80%;
  height: 70%;
 
}


.stats table {
    border: 1px solid black;  
    border-collapse:collapse;
    margin-top:2em;
    display:inline-block                                                                                                                                           
}

td, tr,th {
    border: 1px solid;
    width: 6em;
    height: 3em;
}

.container {
  width: 90%;
  height: 69%;
  margin: 40px auto;
  
  
}

.container>div {
 width: 61%;
  height: 100%
}

.stats table {
    border: 1px solid black;  
    border-collapse:collapse;
    margin-top:2em;
    display:inline-block                                                                                                                                           
}

td, tr {
    border: 1px solid;
}

.second{
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  width: 100%;
  height: 20em;
}
.second > div{
  width: 40%;

}
.second > div > table{
  width: 80%;
  padding: 2px;
}
.second > div > table, tr, td{
  padding: 3px;
}

.four, .three {
  margin-top: 10%
}











  </style>
</head>
<body>
<?php include './utils/db.php'?>


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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <?php if($_SESSION['role'] == 'Manager') {?>
            <li><a class="dropdown-item" href="./Product/home.php">Create a Product</a></li>
              <?php }?>
            <li><a class="dropdown-item" href="./utils/viewProd.php">View Products</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <?php if($_SESSION['role']== 'Administrator') { ?>
            <li><a class="dropdown-item" href="./User/home.php">Create a User</a></li>
            <li><a class="dropdown-item" href="./utils/viewDetails.php">View Details</a></li>
               <?php }?>
            <li><a class="dropdown-item" href="./utils/viewUser.php">View Users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Outgoing
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="./Outgoing/home.php">Register Outgoing</a></li>
            <li><a class="dropdown-item" href="./utils/viewOutgoing.php">View Outgoing</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="./Inventory/home.php">Add to Inventory</a></li>
            <li><a class="dropdown-item" href="./utils/viewInventory.php">View Inventory</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="./User/logout.php">Log Out</a></li>
            <li><a class="dropdown-item" href="./User/useredit.php?userId='<?php echo $_SESSION['userId']?>'">Edit Profile</a></li>
            <li><a class="dropdown-item" href="./User/changePassword.php">Reset Password</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
    <div class="stats">


<div class="three">
<h1>Total Quantity of Products</h1>
      <?php include 'utils/db.php';
       $sql3 = "SELECT stk_products.productId, sum(stk_inventory.quantity) as quantity from stk_inventory,stk_products WHERE stk_inventory.productId=stk_products.productId";
       $query3 = mysqli_query($connection,$sql3);
       if($query3) {
           ?>
          <table>
          <tr>
              <th>Product Id</th>
              <th>Quantity</th>
          </tr>

      <?php 
       while($row3= mysqli_fetch_assoc($query3)) {
           $id = $row3['productId'];?>
          
           <tr>
           <td><?=$row3['productId']?></td>
          <td><?=$row3['quantity']?></td>
         </tr>  
        
          <?php } ?>

          <?php } ?>



           
</table>

       
    </div>

    <div class="four">
    <h1>Total Quantity of Outgoing products</h1>
      <?php include 'utils/db.php';
    $sql4 = "SELECT stk_products.productId, sum(quantity) as quantity from stk_outgoing,stk_products WHERE stk_outgoing.productId=stk_products.productId";
       $query4 = mysqli_query($connection,$sql4);
       if($query4) {
           ?>
          <table>
          <tr>
              <th>Product Id</th>
              <th>Quantity</th>
          </tr>

      <?php 
       while($row4= mysqli_fetch_assoc($query4)) {
           $id = $row4['productId'];?>
          
           <tr>
           <td><?=$row4['productId']?></td>
          <td><?=$row4['quantity']?></td>
         </tr>  
        
          <?php } ?>

          <?php } ?>


</table>

    </div>
</div>
    
 

    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>