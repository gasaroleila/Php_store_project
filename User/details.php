<?php include '../utils/UserInformation.php';
session_start();
include "../utils/db.php";
$id= $_SESSION['userId'];
$username= $_SESSION['username'];
$mac= exec('getmac');
$mac= strtok($mac, ' ');
$ip= $_SERVER['REMOTE_ADDR'];
if($ip === "::1") {
    $exec = exec('hostname');
    $hostname = trim($exec);
    $ip = gethostbyname($hostname);
}

// ADD LOCATION
// machine tracking
$os = UserInfo::get_os();
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    return 'Other';
}
$browser= get_browser_name($_SERVER['HTTP_USER_AGENT']);
$sql= "INSERT INTO client_details(Mac_Address,Ip_Address,Os,browser,username) VALUES ('$mac','$ip','$os','$browser','$username')";
$query= mysqli_query($connection,$sql);

if($query) {
    header("Location: ../index.php");
}
?>