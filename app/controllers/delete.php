<?php
$postId = (int)$_GET['id'];

$user = getUser($_SESSION['userId']);

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ? AND userId = ?");
$stmt->execute([$postId, $user['id']]);

$post = $stmt->fetch();

if ($post['userId'] != $user['id']) {
   header('Location: /');
}


$stmtDel = $pdo->prepare("DELETE FROM posts WHERE id = ? AND userId = ?");
$stmtDel->execute([$postId, $user['id']]);

header('Location: /?act=profile');
