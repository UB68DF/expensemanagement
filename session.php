<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
//$db = mysql_select_db("mydb", $connection);
require_once 'dbconnect.php';
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from users where userId='$user_check'", $conn);
$row=mysql_fetch_array($ses_sql);
$login_session =$row['userName'];

    $email = $row['userEmail'];//." ".$row['vLastName'];
    $username = $row['userName'];
    $password = $row['userPass'];

if(!isset($login_session)){
mysql_close($conn); // Closing Connection
header('Location: index.php');
session_destroy();  // Redirecting To Home Page
}
?>