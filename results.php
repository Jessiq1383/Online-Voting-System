<?php
$host = "127.0.0.1";
$port = 3307;
$db   = "website_voting";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c.candidate_name, COUNT(v.vote_id) AS total_votes
        FROM candidates c
        LEFT JOIN votes v ON c.candidate_id = v.candidate_id
        GROUP BY c.candidate_name";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting Results</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <div class="navdiv">
      <div class="logo">Online Voting System</div>
      <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="candidates.html">Check out the Candidates!</a></li>
        <li><a href="vote.html">Vote here!</a></li>
        <li><a class="login-btn" href="logout.php">Log out</a></li>
      </ul>
    </div>
  </nav>

  <div class="wrapper">
    <h1>Voting Results</h1>
    <table border="1" style="width:60%; margin:auto; text-align:center; border-collapse:collapse;">
      <tr>
        <th>Candidate</th>
        <th>Total Votes</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['candidate_name']; ?></td>
        <td><?php echo $row['total_votes']; ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>
