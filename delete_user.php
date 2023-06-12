<?php
// Include the database connection file
include "db_connect.php";

// Check if the request method is POST and the ID parameter exists
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Delete the user from the database
    $sql = "DELETE FROM user_form WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
