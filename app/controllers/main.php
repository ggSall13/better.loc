<?php 

$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
$stmt->execute();

$posts = $stmt->fetchAll();


require_once VIEWS . '/main.tpl.php';
