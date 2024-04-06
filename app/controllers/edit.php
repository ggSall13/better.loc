<?php
$user = getUser($_SESSION['userId']);
checkUser();
$error = [];

$postId = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ? AND userId = ?");
$stmt->execute([$postId, $user['id']]);

$post = $stmt->fetch();

if ($post['userId'] != $user['id']) {
   header('Location: /');
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $title = trim(htmlspecialchars($_POST['title']));
   $text = trim(htmlspecialchars($_POST['text']));

   if (empty($title) || empty($text)) {
      $error[] = 'Fill all fields';
   } elseif (mb_strlen($title) < 5 || mb_strlen($title) > 255) {
      $error[] = 'Title should be more than 5 and less than 255 symbol';
   } elseif (mb_strlen($text) < 15 || mb_strlen($text) > 2000) {
      $error[] = 'Text should be more than 15 and less than 2000 symbol';
   } else {
      $sql = "UPDATE `posts` SET `title` = :title, `text` = :text WHERE id = :id AND userId = :userId";
      $stmtPost = $pdo->prepare($sql);
      $stmtPost->execute([
         'title' => $title,
         'text' => $text,
         'id' => $postId,
         'userId' => $user['id'],
      ]);

      header('Location: /?act=profile');
      die();
   }
}

require_once VIEWS . '/edit.tpl.php';
