<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchBtn'])) {
   $searchText = '%' . $_POST['searchText'] . '%';

   $sqlSearch = "SELECT * FROM posts WHERE `title` LIKE ? OR `text` LIKE ?";
   $stmtSearch = $pdo->prepare($sqlSearch);
   $stmtSearch->execute([$searchText, $searchText]);

   $searchResult = $stmtSearch->fetchAll();
}


require_once VIEWS . '/search.tpl.php';
