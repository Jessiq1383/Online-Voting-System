<?php
session_start();
include("config.php");

// Make sure user is logged in
if (!isset($_SESSION['voter_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidates Page</title>
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
<h1>Meet the Candidates!</h1>
<br><br>

<!-- Candidate 1 -->
<div class="candidate"> 
<div class="candidate-profile">
  <h3>Paul Doe</h3>
  <p class="Party">Republican</p>

    
  <form action="voting_data.php" method="POST">
    <input type="hidden" name="candidate_id" value="1">

    <div class="input-submit">
      <button type="submit" class="submit-btn" id="submit"></button>
      <label for="submit" class="submit-label">Vote</label>
    </div>
  </form>

</div>

<!-- Candidate 2 -->
<div class="candidate-profile">
  <h3>Joe Biden</h3>
  <p class="Party">Democrat</p>

  <form action="voting_data.php" method="POST">
    <input type="hidden" name="candidate_id" value="2">

    <div class="input-submit">
      <button type="submit" class="submit-btn" id="submit"></button>
      <label for="submit" class="submit-label">Vote</label>
    </div>
  </form>

</div>

<!-- Candidate 3 -->
<div class="candidate-profile">
  <h3>Kane</h3>
  <p class="Party">Green Party</p>

  <form action="voting_data.php" method="POST">
    <input type="hidden" name="candidate_id" value="3">

    <div class="input-submit">
      <button type="submit" class="submit-btn" id="submit"></button>
      <label for="submit" class="submit-label">Vote</label>
    </div>
  </form>

</div>

<!-- Candidate 4 -->
<div class="candidate-profile">
  <h3>Bowser</h3>
  <p class="Party">Goomba Kingdom</p>

  <form action="voting_data.php" method="POST">
    <input type="hidden" name="candidate_id" value="4">

    <div class="input-submit">
      <button type="submit" class="submit-btn" id="submit"></button>
      <label for="submit" class="submit-label">Vote</label>
    </div>
  </form>

</div>

</div>
</div>

</body>
</html>
