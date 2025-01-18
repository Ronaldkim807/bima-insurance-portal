<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db_connection.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $claimant_name = $_POST['claimant-name'];
    $claim_id = $_POST['claim-id'];
    $claim_type = $_POST['claim-type'];
    $claim_description = $_POST['claim-description'];
    $claim_amount = $_POST['claim-amount'];

    // Handle file upload (optional)
    if (isset($_FILES['documents'])) {
        $documents = $_FILES['documents']['name'];
        $target_dir = "uploads/"; // Directory to store uploaded files
        $target_file = $target_dir . basename($_FILES["documents"]["name"]);

        if (move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["documents"]["name"]) . " has been uploaded.";
        } else {
            echo " ";
        }
    } else {
        $documents = '';
    }

    // Insert form data into database
    $sql = "INSERT INTO claims (claimant_name, claim_id, claim_type, claim_description, claim_amount, documents) 
            VALUES ('$claimant_name', '$claim_id', '$claim_type', '$claim_description', '$claim_amount', '$documents')";

    if ($conn->query($sql) === TRUE) {
        echo "New claim submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
