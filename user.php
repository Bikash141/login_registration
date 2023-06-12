<?php
include 'configure.php';
session_start();

print_r($_SESSION); 
if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="content">
        <h3> hi <span>user</span></h3>
        <h1> Welcome <span><?php echo $_SESSION['user_name']?></span></h1>
        <p>This is user dashboard</p>
        <a href="logout.php" class="btn">logout</a><br>
        <a href="create.php" class="btn">create</a>
        <a href="create.php" class="btn">update</a>
       
        

    </div>
    <div>
    
</body>
</html>