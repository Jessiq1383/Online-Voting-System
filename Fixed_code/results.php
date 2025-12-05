<?php
session_start();
include("config.php");

// Query to join votes with voters and candidates
$sql = "
    SELECT 
        candidates.candidate_name,
        voters.voter_full_name,
        votes.vote_timestamp
    FROM votes
    INNER JOIN voters ON votes.voter_id = voters.voter_id
    INNER JOIN candidates ON votes.candidate_id = candidates.candidate_id
    ORDER BY votes.vote_timestamp DESC
";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vote Results</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar">
  <div class="navdiv">
    <div class="logo">Online Voting System</div>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="candidates.php">Candidates</a></li>
      <li><a href="vote.php">Vote</a></li>
      <li><a href="results.php">Voting Results!</a></li>
      <button class="login-btn"><a href="login.php">Log out</a></button>
    </ul>
  </div>
</nav>
</div>


<div class="wrapper">
<table class="table">
    <tr>
        <th>Candidate</th>
        <th>Voter</th>
        <th>Timestamp</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['candidate_name'] ?></td>
                <td><?= $row['voter_full_name'] ?></td>
                <td><?= $row['vote_timestamp'] ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">No votes have been submitted yet.</td>
        </tr>
    <?php endif; ?>
</table>
</div>  
</body>
</html>
