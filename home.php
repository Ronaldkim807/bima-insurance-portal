<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!-- Dashboard -->
<section id="dashboard" class="home-section">
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <p>You are now logged in and can submit and track claims.</p>
    <a href="submit_claim.php">Submit a Claim</a>
    <a href="track_claim.php">Track Your Claim</a>
    <a href="logout.php">Logout</a>
</section