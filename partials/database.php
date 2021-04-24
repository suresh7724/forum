<?php
// <!-- connection to threads table -->
// $server='localhost';
// $username='root';
// $password='';
// $forumDatabase='forum';

$server='localhost';
$username='root';
$password='';
$forumDatabase='forum';
$connectdb=mysqli_connect($server,$password,$username,$forumDatabase);
// sql query to connect threads table
$threadQuery='SELECT * FROM `category`';


$catResult=mysqli_query($connectdb,$threadQuery);



// connection to user table

// $server='localhost';
// $username='root';
// $password='';
// $forumDatabase='forum';
$server='localhost';
$username='root';
$password='Surya@my';
$forumDatabase='forum';
$connectdb=mysqli_connect($server,$username,$password,$forumDatabase);
// sql query to connect threads table
$userQuery='SELECT * FROM `user_data`';


$userResult=mysqli_query($connectdb,$userQuery);


?>