<?php
include 'configure.php';
session_start(); 

if(isset($_SESSION['logid'])){
    header('location:dashboard.php');
}
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
   

    $select = "SELECT `id`,`name`,`user_type` FROM `user_form` WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){

       $row = mysqli_fetch_assoc($result);echo "<pre>";
       
       $_SESSION['logid'] = $row['id'];
       $_SESSION['logname'] = $row['name'];
       $_SESSION['logtype'] = $row['user_type'];
       header('location:dashboard.php');

      
    }else{
        $error[]='incorrect email or password!';
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
            <input type="email" name="email" require placeholder="Enter your email" autocomplete="off">
            <input type="password" name="password" require placeholder="Enter your password" autocomplete="off">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register.php">register now</a></p>
            <p><a href="index.php">home</a></p>
    </div>
</body>
</html>