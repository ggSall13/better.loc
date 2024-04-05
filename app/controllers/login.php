<?php 

$title = 'login';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $email = trim (htmlspecialchars($_POST['email']) );
   $password = trim (htmlspecialchars($_POST['password']) );

   if (empty($email) || empty($password)) {
      $error[] = 'Fill all fields';
   } elseif(mb_strlen($password) <= 5) {
      $error[] = 'Uncorrect password';
   }
   else {
      $sql = "SELECT * FROM users WHERE `email` = ?";
      $stmtUser = $pdo->prepare($sql);
      $stmtUser->execute([$email]);

      $user = $stmtUser->fetch();

      if (!$user) {
         $error[] = 'Not found this User';
      } elseif(password_verify($password, $user['password'])) {
         $_SESSION['userId'] = $user['id'];
         $_SESSION['username'] = $user['username'];

         header('Location: /');
         die();
      }
   }
}


require_once VIEWS . '/login.tpl.php';
