<?php
include 'configure.php';
session_start();
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM `user_form` WHERE email='$email'";
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        $error[]= 'user already exist';
    }else{
        if($password!= $cpassword){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO `user_form`(name,email,password,user_type) VALUES('$name','$email','$password','$user_type')";
            $result1 = mysqli_query($conn,$insert);
            if($result1){
                echo "Registration Successfully";
            }else{
                echo "Something went wrong!!";
            }
            header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" >
            <h3>register now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
            <input type="text" name="name" id="name"  placeholder="Enter your name" autocomplete="off">
            <input type="email" name="email"  id="email"  placeholder="Enter your email" autocomplete="off">
            <input type="password" name="password" id="pass"  placeholder="Enter your password" autocomplete="off">
            <input type="password" name="cpassword" id="cpass"  placeholder="Confirm your password" autocomplete="off">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>

            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login.php">login now</a></p>
            
            <p><a href="index.php">home</a></p>
    </div>
</body>
</html>
<script>
    let a = document.getElementById('name').value
</script>