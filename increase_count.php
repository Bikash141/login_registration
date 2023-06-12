<?php
include 'configure.php';
session_start();
//print_r($_SESSION);
$userId = $_SESSION["logid"];
$count = $_POST["action"];
//print_r($count);
?>

<?php
// Start the session (if not already started)

echo $sql = "UPDATE `user_form` SET count = '{$count}' WHERE id = '{$userId}'";
$result = mysqli_query($conn, $sql);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the action parameter is set and equals to increase_count
if (isset($_POST["action"]) && $_POST["action"] == "increase_count") {
    // Increase the count by 1 and store it in the session
    if (isset($_SESSION["count"])) {
        $_SESSION["count"]++;
    } else {
        $_SESSION["count"] = 1;
    }
    
    // Return the updated count
    echo $_SESSION["count"];
}

?>
