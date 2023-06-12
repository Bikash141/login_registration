<?php
include 'configure.php';
session_start();

$userId = $_SESSION["logid"];
$point = $_POST["reward_coins"];
$rupees = $_POST["coins"];

// Retrieve the previous values from the database
$sql = "SELECT reward_coins, coins FROM user_form WHERE id = '{$userId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prevPoint = $row['reward_coins'];
$prevRupees = $row['coins'];

// Add the recent values to the previous values
$newPoint = $prevPoint + $point;
$newRupees = $prevRupees + $rupees;

// Update the database with the new values
$sql = "UPDATE user_form SET reward_coins = '{$newPoint}', coins = '{$newRupees}' WHERE id = '{$userId}'";
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Echo a response to indicate success or failure to the AJAX request
if ($result) {
    echo "Values added successfully.";
} else {
    echo "Error updating data: " . mysqli_error($conn);
}
?>
