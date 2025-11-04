<?php
$host='127.0.0.1'; $port=3307; $user='root'; $pass='';
$pdo=new PDO("mysql:host=$host;port=$port;dbname=website_voting;charset=utf8mb4",
  $user,$pass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
session_start();

$first = trim($_POST['first_name'] ?? '');
$last  = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$passw = $_POST['password'] ?? '';

if(!$first || !$last || !$email || !$passw){ exit('Missing fields'); }

$hash = password_hash($passw, PASSWORD_DEFAULT);
$st = $pdo->prepare("INSERT INTO voters (voter_email, voter_password, has_voted) VALUES (?,?,0)");
$st->execute([$email, $hash]);

$_SESSION['voter_id'] = $pdo->lastInsertId();
header('Location: home.html'); 

