<?php 
session_start();
  if(!isset($_SESSION['userId'])) {
      header("Location: ./login.php");
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
   <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
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
    height: 60%;
    margin: -33px auto;
    /* color: #aeb0b2; */
    /* margin-bottom: 5em; */
    /* border-radius: 2em; */
}

.row>* {
  padding: 0
}



   input[type="text"],input[type=email],input[type=tel],select, input[type="password"] {
     width: 2em;
     height: 50%;
     border-radius: 4px;
     padding:  4px 0px 4px 10px;
     border: 1px solid #18243c;
     margin: 10px 0px;
   }

   select#nation, select#role {
    height: 2em;
}

   .select {
     height: em;
     width: 72%;
   }

   .select#nation {
     height: 5em!important;
   }

   input#photo {
    width: 17em;
}

input[type="radio"]>label {
  width: 20px
}

.row {
    margin: 20px 0;
    height: 12%;
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
  input[type="text"],input[type=email],input[type=tel], input[type="password"] {
    width: 72%;
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


/* nav {
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
  width: 79%;
  height: 120%;
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
            <li><a class="dropdown-item" href="../utils/viewProd.php">View Products</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <?php if($_SESSION['role']== 'Administrator') { ?>
            <li><a class="dropdown-item" href="./home.php">Create a User</a></li>
               <?php }?>
            <li><a class="dropdown-item" href="../utils/viewUser.php">View Users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Outgoing
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../Outgoing/home.php">Register Outgoing</a></li>
            <li><a class="dropdown-item" href="../utils/viewOutgoing.php">View Outgoing</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../Inventory/home.php">Add to Inventory</a></li>
            <li><a class="dropdown-item" href="../utils/viewInventory.php">View Inventory</a></li>
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
    <div class="left">
        <h1>G-STORE MANAGMENT SYSTEM</h1>
        <p>Manage your product with G-store</p>
        <img src="../undraw_Operating_system_re_iqsc.svg" alt="">
        </div>

        <div class="right">
        <h1>Create a User</h1>
        <?php 
          if(isset($_SESSION['Error'])) {
            ?>
            <span class="error"><?= $_SESSION['Error']?></span>
          <?php 
            $_SESSION['Error'] = "";  
        }?>
        <form action="createUser.php" method="POST" enctype='multipart/form-data'>
        <div class="row">
        <label for="fname">FirstName</label>
        <input type="text" name="fname" id="fname" required>
      </div>
  
      <div class="row">
        <label for="lname">LastName</label>
        <input type="text" name="lname" id="lname" required>
      </div>

      <div class="row">
        <label for="phone">Telephone</label>
        <input type="tel" name="phone" id="phone" pattern="[0-9]+" placeholder="0-9">
       </div>
  
      <div class="row">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
   
   


   <div class="row small">
     <label for="gender" class="gender">Gender</label>
     <input type="radio" name="gender" id="male" value="male"><label for="male">Male</label>
     <input type="radio" name="gender" id="female" value="female"><label for="female">Female</label>
   </div>
  
   <div class="row select">
    <label for="nation">Nationality</label>
    <select name="nation" id="nation">

    <?php 
    $sql = "SELECT * FROM countries";
    $query = mysqli_query($connection,$sql);
    if($query) {
      while($row=mysqli_fetch_assoc($query)) {?>
        <option value=<?=$row['countryId']?>><?=$row['countryName']?></option>
         <?php } ?>
         <?php  }?>
        
    </select>
   </div>

   <div class="row select">
    <label for="role">Role</label>
    <select name="role" id="role" required>

    <?php 
    $sql = "SELECT * FROM roles";
    $query = mysqli_query($connection,$sql);
    if($query) {
      while($row=mysqli_fetch_assoc($query)) {?>
        <option value=<?=$row['roleId']?>><?=$row['roleName']?></option>
         <?php } ?>
         <?php  }?>
        
    </select>
   </div>

   <div class="row">
   <label for="usname">userName</label>
   <input type="text" id="usname" name="username" required>
     
   </div>

   <div class="row">
    <label for="pass">Password</label>
    <input type="password" id="pass" name="pass" required minlength=6>
      
    </div>

    

    <!-- <div class="camera">
    <video id="video">Video stream not available.</video>
    <button id="startbutton">Take photo</button> 
  </div>
  <canvas id="canvas">
  </canvas> -->

<!-- 
  <div class="row">
    <input type="hidden" id="photo" name='profile'>
  </div>

  <div class="row">
   <input type="reset" value="Reset">
  </div> -->

 
    

    

  <div class="row">
    <input type="submit" name="Send">
    </div>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
      (function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  var width = 320;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function(stream) {
      video.srcObject = stream;
      video.play();
    })
    .catch(function(err) {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
      console.log(data);
      photo.setAttribute('value', data);
    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();
    </script>
</body>
</html>