<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(!empty($email) && !empty($password))
{
    //lets chk if users entered email nd password matches with any row in database table
$sql = mysqli_query($con , "SELECT * FROM users WHERE email= '{$email}' AND password = '{$password}'");
if(mysqli_num_rows($sql) > 0)//if mail nd password matched
{
$row = mysqli_fetch_assoc($sql);
$status = "Online";
$sql2 = mysqli_query($con , "UPDATE users SET status ='{$status}' where unique_id = {$row['unique_id']}");
if(sql2){
$_SESSION['unique_id'] = $row['unique_id'];
echo "ho";
}
}
else{
    echo "Email or Password is incorrect";
}
}
else{
    echo "All input fields are required!!";
}
?>