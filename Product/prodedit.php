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
    <!-- <link rel="stylesheet" href="joinus.css"> -->
    <style>
    * {
   margin: 0 ;
   padding: 0;
   box-sizing: border-box;
 }
  body {
    font-family: 'Graphik'
  }
   label {
     color: #18243c;
     font-size: 1em;
     width: 100%;
     display: inline-block;
   }

   a {
    display: block;
    margin-left: 23em;
    margin-top: 1em;
 }

   .main {
    height: 134vh;
   }

   .main h1 {
    margin: 0 auto;
    width: 100%;
    height: 2em;
    text-align:center;
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
     width: 39%;
    height: 8%;
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


nav {
  width: 100%;
  height:5%;
  display: flex;
  background-color: #6c63ff;
  justify-content: space-between;
}

nav > ul{
  display: flex;
  width: 71%;
}
li{
  width: 5%; 
}

ul li a {
  text-decoration: none;
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
}

.search{
  height: 3%;
  background: none;
}
.search > input[type="text"]{
  border: 2px solid black;
}
/* #3e3d61 */
nav button {
  /* border: 2px solid #142535; */
  width: 8em;
  height: 2.8em;
  background: #32cb7b;
  border-radius: -1em;
  color: white;
  border: none;
  border-radius: 4px;
  font-weight: 900;
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

.container {
  width: 67%;
  height: 69%;
  margin: 40px auto;
  box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
  
}

.container>div {
 width: 50%;
  height: 100%
}

.left {
  float: left;
  background-color: #edf0f4;

}

.left h1 {
    margin-top: 47px;
    color: #18243c
}


.left img {
   width: 92%;
   height: 55%;
    display: block;
    margin: 37px auto;
}

.left p {
    width: 90%;
    height: 2%;
    margin: 17px auto;
    text-align: center;
}

.right {
  float: right;
  background-color: #f9fafc
}

.right h1 {
    height: 5%;
    font-size: 29px;
    margin-top: 15px;
    font-weight: 500;
}

.small {
  height: 7%
}

.small label , .small>input {
  width: 13%;
  margin-top: 11px;
}
 
 select {
   height: 25px
 }



  </style>
</head>
<body>
<?php include '../utils/db.php';

$prodId = $_GET['prodId'];


$sql = "SELECT sp.productId, sp.product_Name, sp.brand, sp.supplier_phone, sp.supplier  FROM stk_products sp  WHERE productId=$prodId";
$query = mysqli_query($connection,$sql);

if($query) {
   $row = mysqli_fetch_assoc($query);
?>
    <div class="main">
    <nav>
          <label for="logo">G-STORE</label>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../Product/home.php">Products</a></li>
                    <li><a href="../User/home.php">Users</a></li>
                    <li><a href="../Inventory/home.php">Inventory</a></li>
                    <li><a href="../Outgoing/home.php">Outgoing</a></li>
                </ul>
            </nav> 

        <div class="container">
          <div class="left">
          <h1>G-STORE MANAGMENT SYSTEM</h1>
        <p>Manage your product with G-store</p>
        <img src="../undraw_Operating_system_re_iqsc.svg" alt="">
          </div>
          <div class="right">
          <h1>Update a Product</h1>
        <form action="updateProd.php" method="POST">
        <input type="hidden" name="productId" value="<?=$row['productId']?>">
        <div class="row">
        <label for="pname">Product Name</label>
        <input type="text" name="prodName" id="pname" required value="<?=$row['product_Name']?>">
      </div>
  
      <div class="row">
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" requied value="<?=$row['brand']?>">
      </div>

      <div class="row">
        <label for="suphone">supplier_phone</label>
        <input type="tel" name="supplier-phone" id="suphone" required min=0 value="<?= $row['supplier_phone']?>">
       </div>
  
      <div class="row">
        <label for="supplier">Supplier</label>
        <input type="text" name="supplier" id="supplier" required value="<?= $row['supplier']?>">
      </div>

      <input type="submit" name="update" value="update">
      </form>
      </div>
      </div>

    <?php }else {
        echo "ERROR".mysqli_error($connection);
    } ?>

<a href="../index.php">Go Back</a>
</body>
</html>