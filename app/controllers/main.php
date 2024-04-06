<?php 
$sql = "SELECT t1.*, t2.username FROM posts AS t1 JOIN users AS t2 ON t1.userId = t2.id ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll();


require_once VIEWS . '/main.tpl.php';
