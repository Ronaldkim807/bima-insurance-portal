<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db_connection.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['claim-id'])) {
    $claim_id = $_POST['claim-id'];

    // Sanitize input to prevent SQL injection
    $claim_id = mysqli_real_escape_string($conn, $claim_id);

    // Query the database to fetch claim details based on the Claim ID
    $sql = "SELECT * FROM claims WHERE claim_id = '$claim_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the claim record
        $row = $result->fetch_assoc();
        
        // Return the claim status information as a response
        echo "<strong>Claim ID:</strong> " . $row['claim_id'] . "<br>";
        echo "<strong>Claimant Name:</strong> " . $row['claimant_name'] . "<br>";
        echo "<strong>Claim Type:</strong> " . $row['claim_type'] . "<br>";
        echo "<strong>Claim Description:</strong> " . $row['claim_description'] . "<br>";
        echo "<strong>Claim Amount:</strong> $" . $row['claim_amount'] . "<br>";
        echo "<strong>Status:</strong> " . (isset($row['status']) ? $row['status'] : 'Pending') . "<br>";
    } else {
        echo "No claim found with this Claim ID.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
