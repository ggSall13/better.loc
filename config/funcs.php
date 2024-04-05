<?php

function dd($data) {
   echo '<pre>';
      var_dump($data);
   echo '</pre>';
   die();
}

function dump($data) {
   echo '<pre>';
      var_dump($data);
   echo '</pre>';
}


function printR($data) {
   echo '<pre>';
      var_dump($data);
   echo '</pre>';
}

function prd($data) {
   echo '<pre>';
      var_dump($data);
   echo '</pre>';
   die();
}


function abort($num) {
   die($num);
}


function getUser($idUser) {
   global $pdo;
   $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
   $stmt->execute([$idUser]);

   $user = $stmt->fetch(); 
   return $user;
}

function checkUser() {
   if (empty($_SESSION)) {
      header('Location: /?act=login');
      die();
   }
}
