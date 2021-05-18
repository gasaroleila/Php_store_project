<?php

session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
//send the user to the necessary page
header('Location:login.php');    
