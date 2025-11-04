<?php

$host='127.0.0.1'; $port=3307; $user='root'; $pass='';
$pdo=new PDO("mysql:host=$host;port=$port;dbname=website_voting;charset=utf8mb4",$user,$pass,
  [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
session_start();

$voter_id = isset($_SESSION['voter_id']) ? (int)$_SESSION['voter_id'] : 0;
$candidate_id = (int)($_GET['candidate_id'] ?? 0);
if ($candidate_id <= 0) { exit('Candidate not specified'); }



$pdo->beginTransaction();


$ins = $pdo->prepare("INSERT INTO votes (voter_id, candidate_id) VALUES (?, ?)");
$ins->execute([$voter_id, $candidate_id]);


$pdo->commit();

header('Location: thankyou.html');
exit;
