<?php
include("config.php");
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login to Vote!</title>
</head>

<body>
  <!--  CSS CLASS TO CENTER THE FORM-->
  <div class="center-box">
    <div class="login-box">

      <div class="login-header">
        <header>Login to Vote!</header>
      </div>

      <!-- Login form USING POST TO SEND DATA-->
      <form action="auth_login.php" method="POST">

  
 <div class="input-box">
 <input type="text" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
  </div>


 <div class="input-box">
<input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>
 </div>
 <div class="input-submit">
       
 <button type="submit" name="login_user" class="submit-btn" id="submit"></button>
  <label for="submit" class="submit-label">Sign In</label>
  </div>

       
 <div class="register-link">
  <p>Don't have an account? <a href="register.php">Register here!</a></p>
 </div>

</form>
      
  </div>
  </div>
</body>
</html>
