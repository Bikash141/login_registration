<?php
include 'configure.php';
session_start();
if(!isset($_SESSION['logid'])){
    header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['logtype']?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="content">
        <h3> hi </h3>
        <h1> Welcome <span><?php echo $_SESSION['logname']?></span></h1>
        
<?php        
if( $_SESSION['logtype']=='admin' ){
    //header('location:admin.php');
    
    
?>
<p>This is an admin dashboard</p>
<a href="profile.php" class="btn">Profile</a>
<a href="emp_details.php" class="btn">Emp_Details</a>
<a href="blog.php" class="btn">Blog</a>
<?php
}elseif( $_SESSION['logtype']=='user' ){
?>

<p>This is a user dashboard</p>

<?php
}
?>

<a href="rewardsystem.php" class="btn">Reward system</a>
<a href="reward_page.php" class="btn">Reward page</a>
<a href="profile.php" class="btn">Profile</a>
<a href="logout.php" class="btn">logout</a>

    </div>
    <div>
    
</body>
</html>