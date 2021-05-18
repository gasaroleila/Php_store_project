<?php
session_start();
 if(isset($_SESSION['userId'])) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
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

   /* a {
    display: block;
    margin-left: 23em;
    margin-top: 1em;
 } */

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

/*nav > ul{
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
} */

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
  padding: 0!important;
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
<?php include '../utils/db.php'?>


    <div class="main">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-color: #6c63ff!important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" style="color:white; text-transform: uppercase;">G-store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</div>
</nav>

    <div class="container">
    <div class="left">
        <h1>G-STORE MANAGMENT SYSTEM</h1>
        <p>Manage your product with G-store</p>
        <img src="../undraw_Operating_system_re_iqsc.svg" alt="">
        </div>

        <div class="right">
        <h1>Login G-store</h1>
        <?php 
          if(isset($_SESSION['Error'])) {
            ?>
            <span class="error"><?= $_SESSION['Error']?></span>
          <?php 
            $_SESSION['Error'] = "";  
        }?>
  
        <form action="./userLogin.php" method="POST">
        <div class="row">
        <label for="usname">username</label>
        <input type="text" name="usname" id="usname">
      </div>
  
      <div class="row">
        <label for="lname">Password</label>
        <input type="password" name="pass" id="pass">
      </div>

      <input type="submit" name="Send">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>