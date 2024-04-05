<?php 
$user = getUser($_SESSION['userId']);
$title = $_SESSION['username'];
checkUser();


$stmt = $pdo->prepare("SELECT * FROM posts WHERE userId = ? ORDER BY id DESC");
$stmt->execute([$user['id']]);

$posts = $stmt->fetchAll();



require_once VIEWS . '/profile.tpl.php';
