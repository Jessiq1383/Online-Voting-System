<?php
$host='127.0.0.1'; $port=3307; $user='root'; $pass='';
$pdo=new PDO("mysql:host=$host;port=$port;dbname=website_voting;charset=utf8mb4",$user,$pass,
  [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
session_start();

$email = trim($_POST['email'] ?? '');
$passw = $_POST['password'] ?? '';

if (!$email || !$passw) { exit('Missing credentials'); }

$q = $pdo->prepare("SELECT voter_id, voter_password FROM voters WHERE voter_email=?");
$q->execute([$email]);
$u = $q->fetch();

if ($u && password_verify($passw, $u['voter_password'])) {
  $_SESSION['voter_id'] = $u['voter_id'];
  header('Location: home.html');
  exit;
}
exit('Invalid email or password');
