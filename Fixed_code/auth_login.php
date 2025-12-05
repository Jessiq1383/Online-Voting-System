<?php
include("config.php");
session_start();

if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $sql = "SELECT * FROM voters WHERE voter_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['voter_password'])) {
            
            // Save session
            $_SESSION['voter_id'] = $user['voter_id'];
            $_SESSION['voter_name'] = $user['voter_full_name'];

            header("Location: home.php");
            exit();
        } else {
            echo "<p style='color:red'>Incorrect password</p>";
        }
    } else {
        echo "<p style='color:red'>Email not found</p>";
    }
}



?>