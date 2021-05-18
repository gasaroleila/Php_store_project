<?php 
session_start();
  if(!isset($_SESSION['userId'])) {
      header("Location: ./login.php");
  } 
  
if($_SESSION['role'] !== 'Administrator') {
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


if(isset($_POST['Send'])) {
    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['phone']);
    $gender = trim($_POST['gender']);
    $nationality = trim($_POST['nation']);
    $role = trim($_POST['role']);
    $userName = trim($_POST['username']);
    $Password = trim($_POST['pass']);
    $hashedPassword = hash('SHA512',$Password );
    // $temporary_file_data = $_FILES['profile']['tmp_name'];
    // $final_filename = rand(1,1000).$_FILES['profile']['name'];
    // $profile = trim($_POST['profile']);

    // if($profile) {
    //     fopen("file1.png", "r+");
    // }

    $sqlA = "SELECT * FROM stk_users WHERE username = '$userName' OR email = '$email'";
    $queryA = mysqli_query($connection,$sqlA);

    if($queryA && mysqli_num_rows($queryA)>0) {
        $_SESSION['Error'] = "username or email is already used!";
        header("Location: ./home.php");
        die();
    }
    
    // add status
    move_uploaded_file($temporary_file_data, "uploads/" . $final_filename);
    $sql = "INSERT INTO stk_users(firstName,lastName,telephone,gender,nationality,username,email,password,roleId,profile) VALUES ('$firstName','$lastName','$telephone','$gender','$nationality','$userName','$email','$hashedPassword','$role','$final_filename')";
    $query = mysqli_query($connection,$sql);
        
    
    
    if($query) {
    header("Location: ../utils/viewUser.php");
    }
    
     } 
     ?>    




