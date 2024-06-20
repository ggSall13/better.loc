<?php
$title = 'Reg';
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = trim(htmlspecialchars($_POST['username']));
   $email = trim(htmlspecialchars($_POST['email']));
   $password = trim(htmlspecialchars($_POST['password']));
   $repPassword = trim(htmlspecialchars($_POST['repPassword']));

   if (empty($username) || empty($email) || empty($password) || empty($repPassword)) {
      $error[] = 'Fill all fields';
   } elseif (mb_strlen($username) <= 1 || mb_strlen($username) > 30) {
      $error[] = 'Username must be more than 1 symbol and less than 30 symbols';
   } elseif (mb_strlen($password) <= 5) {
      $error[] = 'Password must be more than 5 symbol';
   } elseif ($password !== $repPassword) {
      $error[] = 'Password\'s must be equal';
   } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
      // $data = [
      //    'username' => $username,
      //    'email' => $email,
      //    'password' => $password
      // ]; 

      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
         'username' => $username,
         'email' => $email,
         'password' => $password,
      ]);

      header('Location: /?act=login');
      die();
   }
} else {
   $username = '';
   $email = '';
}


require_once VIEWS . '/reg.tpl.php';
