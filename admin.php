<?php
include 'configure.php';
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
    <div class="content">
        <h3> hi <span>admin</span></h3>
        <h1> Welcome <span><?php echo $_SESSION['admin_name']?></span></h1>
        <p>This is an Admin dashboard</p>
        <a href="logout.php" class="btn">logout</a>
    </div>
    <h1>Hello Rahul Bhai</h1>
    <div>
    
</body>
</html>