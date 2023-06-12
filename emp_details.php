<?php
include 'configure.php';
session_start();
if($_SESSION['logtype']!='admin'){
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp_Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid black;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 8px;
            cursor: pointer;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0062cc;
            transform: translateY(-2px);
        }
        
    </style>
</head>
<script>
        function deleteRow(id) {
            // Confirm with the user before deleting
            if (confirm("Are you sure you want to delete this user?")) {
                // Send an AJAX request to the PHP script to delete the user from the database
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_user.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // If the deletion was successful, remove the row from the table
                        if (xhr.responseText == "success") {
                            var row = document.getElementById("row_" + id);
                            row.parentNode.removeChild(row);
                        } else {
                            alert(xhr.responseText);
                        }
                    }
                };
                xhr.send("id=" + id);
            }
        }
    </script>
</head>
<body>
<a href="admin.php" class="btn">Back to dashboard</a>
<div class="container">
    <div class="content">
        <h1>Registered User Details</h1><br>
        <?php
        $sql = "SELECT id, name, email FROM user_form WHERE user_type = 'user'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr id='row_".$row["id"]."'><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td><button class='delete-btn' onclick='deleteRow(".$row["id"].")'>Delete</button></td></tr>";
            }
            echo "</table>";

        } else {
            echo "No users found.";
        }
        ?>
    </div>
</div>
</body>
</html>
