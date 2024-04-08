<?php
$user = getUser($_SESSION['userId']);
checkUser();
$error = [];

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

      // простите за такую проверку
      if (strpos($_FILES['file']['type'], 'mage/png') || strpos($_FILES['file']['type'], 'mage/jpg') 
            || strpos($_FILES['file']['type'], 'mage/jpeg')) {
         $imgName = time() . '_' . $_FILES['file']['name'];
         move_uploaded_file($_FILES['file']['tmp_name'], DIR_PATH . "/assets/img/$imgName");
      }
         $sql = "INSERT INTO posts (`userId`, `title`, `text`, `imgPath`) VALUES (:userId, :title, :text, :imgPath)";
         $stmtPost = $pdo->prepare($sql);
         $stmtPost->execute([
            'userId' => $user['id'],
            'title' => $title,
            'text' => $text,
            'imgPath' => "img/$imgName",
         ]);

      header('Location: /?act=profile');
      die();
   }
}

require_once VIEWS . '/add.tpl.php';
