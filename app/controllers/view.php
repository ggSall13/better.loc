<?php
$id = (int)$_GET['id'];

$sql = "SELECT t1.*, t2.username FROM posts AS t1 JOIN users AS t2 ON t1.userId = t2.id WHERE t1.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$post = $stmt->fetch();


require_once VIEWS . '/view.tpl.php';
