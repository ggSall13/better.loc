<?php
$stmtCount = $pdo->prepare("SELECT COUNT(*) FROM posts");
$stmtCount->execute();
$count = $stmtCount->fetchColumn();

$maxPost = 8;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$pages = ceil($count / $maxPost);
$currentPage = isset($_GET['page']) ?? 1;

$currentPage = $currentPage > 1 ? $currentPage - 1 : 0;

$offset = $maxPost * $currentPage;




$sql = "SELECT t1.*, t2.username FROM posts AS t1 JOIN users AS t2 ON t1.userId = t2.id ORDER BY t1.id DESC LIMIT ?, ?";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(1, $offset, PDO::PARAM_INT);
$stmt->bindParam(2, $maxPost, PDO::PARAM_INT);
$stmt->execute();

$posts = $stmt->fetchAll();

require_once VIEWS . '/main.tpl.php';
