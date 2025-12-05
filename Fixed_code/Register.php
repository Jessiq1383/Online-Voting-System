<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
include("config.php");


// store the data
if (isset($_POST['register_user'])) {

    $full_name = $_POST['full_name'];
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO voters (voter_username, voter_password, voter_full_name, voter_email)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $hashed_password, $full_name, $email);

    if ($stmt->execute()) {
        echo "<p style='color:green'>Registration successful! Now head to <a href='login.php'>Login</a> to login</p>";
    } else {
        echo "<p style='color:red'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class=" center-box">
<div class="login-box">
<div class="login-header">
<header>Add in your info and quickly register!</header>

</div>
<div class="input-box">
<form action="register.php" method="POST">

<input type="text" class="input-field" name="full_name" placeholder="Full Name" autocomplete="off" required>
<input type="text" class="input-field" name="username" placeholder="Username" autocomplete="off" required>
<input type="email" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
<input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>

    </div>

    <div class="input-submit">
      <button type="submit" name="register_user" class="submit-btn" id="submit"></button>
      <label for="submit" class="submit-label">Register</label>
    </div>

    </form>
 </div>
 </div>
</body>
</html>