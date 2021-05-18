<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  
    table {
    border: 2px solid black;
    border-collapse: collapse;
}


</style>
</head>


<?php include '../utils/db.php';
session_start();
if(!isset($_SESSION['userId'])) {
    header("Location: ./login.php");
}

if($_SESSION['role'] !== 'Administrator') {
    header("Location: ../index.php");
}

if(isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $telephone = $_POST['phone'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nation'];
    
    
        $sql = "UPDATE stk_users SET firstname='$firstName', lastname='$lastName', gender='$gender', nationality='$nationality', telephone='$telephone' WHERE userId=$userId";
        $query = mysqli_query($connection,$sql);
        
    
    ?>
    
    <?php 
    
    if($query) {
    header("Location: ../utils/viewUser.php");    
 } } ?>


</html>
