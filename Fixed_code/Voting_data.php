<?php
session_start();
include("config.php");

// Must be logged in
if (!isset($_SESSION['voter_id'])) {
    header("Location: login.php");
    exit();
}

$voter_id = $_SESSION['voter_id'];
$candidate_id = $_POST['candidate_id'];


$check = $conn->prepare("SELECT has_voted FROM voters WHERE voter_id = ?");
$check->bind_param("i", $voter_id);
$check->execute();
$result = $check->get_result();
$row = $result->fetch_assoc();

// SCRIPT TO CHECK IF USER VOTED 
if ($row['has_voted'] == 1) {


    echo "<script>
            alert('You have already voted!');
            window.location.href = 'home.php';
          </script>";
    exit();
}

// Insert vote
$sql = "INSERT INTO votes (voter_id, candidate_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $voter_id, $candidate_id);

if ($stmt->execute()) {

    // Mark person as having voted
    $update = $conn->prepare("UPDATE voters SET has_voted = 1 WHERE voter_id = ?");
    $update->bind_param("i", $voter_id);
    $update->execute();

    header("Location: thankyou.php");
    exit();

} else {
    echo "Error: " . $stmt->error;
}
