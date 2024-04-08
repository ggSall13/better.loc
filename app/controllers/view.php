<?php
$id = (int)$_GET['id'];

$sql = "SELECT t1.*, t2.username FROM posts AS t1 JOIN users AS t2 ON t1.userId = t2.id WHERE t1.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$post = $stmt->fetch();

$error = [];

$user = getUser($_SESSION['userId']) ?? NULL;
// getComments

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addComment'])) {
   if (empty($user)) {
      $username = trim(htmlspecialchars( $_POST['username'])) ?: "Unknown";
   } else {
      $username = $user['username'];
   }

   $text = trim(htmlspecialchars( $_POST['text']));

   if (empty($text)) {
      $error[] = 'Fill all fields';
   } elseif (mb_strlen($text) < 5 || mb_strlen($text) > 500) {
      $error[] = 'Text should be less than 500 and more than 5 symbols';
   } else {
      $sql = "INSERT INTO `comments` (`userId`, `postId`, `username`, `text`) VALUES (?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$user['id'], $id, $username, $text]);

      header('Location: /?act=view&id=' . $id);
   }
}

$sqlComment = "SELECT * FROM `comments` WHERE postId = ?";
$stmtComment = $pdo->prepare($sqlComment);
$stmtComment->execute([$id]);

$comments = $stmtComment->fetchAll();


require_once VIEWS . '/view.tpl.php';
