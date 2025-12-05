<?php
$host='127.0.0.1'; $port=3307; $user='root'; $pass='';
$pdo=new PDO("mysql:host=$host;port=$port;dbname=website_voting;charset=utf8mb4",$user,$pass,
  [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

$cnt = (int)$pdo->query("SELECT COUNT(*) FROM candidates")->fetchColumn();
if ($cnt === 0) {
  $pdo->exec("INSERT INTO candidates (candidate_name) VALUES
    ('Paul Doe'),('Joe Biden'),('Xane'),('Bowser')");
  echo "✅ Candidates inserted.";
} else {
  echo "ℹ️ Candidates already exist ($cnt).";
}
