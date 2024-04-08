<?php require_once INCS . '/header.php';

?>

<main class="main py-3">
   <div class="container content">
      <div class="Better_call_Saul">
         <h2 class="py-2">Game blog</h2>
         <img src="https://images.squarespace-cdn.com/content/v1/5edb18356cb927448d88a93f/1591499448720-OXA1J49CZ6C6K86MK42Q/VideoGameLEGENDS.jpg" class="img-fluid better_call_img" alt="better call saul">
         <p class="better_call_text">
            A page about a blog with games, here you can post and comment on posts
         </p>
      </div>
      <hr>
      <h2 class="py-3 text-center">POSTS</h2> 
      <nav aria-label="Page navigation example">
         <ul class="pagination">
            <?php if ($page > 1) :?>
               <li class="page-item"><a class="page-link" href="/?page=<?= $page - 1?>">Previous</a></li>
            <?php endif ?>
            <?php for ($i = 1; $i <= $pages; $i++) :?>
               <li class="page-item"><a class="page-link" href="/?page=<?=$i?>"><?= $i?></a></li>
            <?php endfor;?>
            <?php if (empty($_GET['page'])) :?>
               <li class="page-item"><a class="page-link" href="/?page=<?= $page + 2?>">Next</a></li>
               <?php elseif ($page < $pages) :?>
               <li class="page-item"><a class="page-link" href="/?page=<?= $page + 1?>">Next</a></li>
            <?php endif?>
         </ul>
      </nav>
      <div class="row">
         <?php foreach ($posts as $post) :?>
               <div class="col-md-3 py-3">
                  <div class="card" style="width: 18rem;">
                     <?php if ($post['imgPath']) :?>
                        <a href="/?act=view&id=<?=$post['id']?>"><img src="<?= URL_PATH . '/assets/' . $post['imgPath']?>" class="card-img-top" alt="title"></a>
                     <?php else :?>
                        <a href="/?act=view&id=<?=$post['id']?>"><img src="https://mykaleidoscope.ru/x/uploads/posts/2022-09/1663158407_9-mykaleidoscope-ru-p-zlobnaya-ulibka-pinterest-12.jpg" class="card-img-top post-image" alt="title"></a>
                     <?php endif?>
                     <div class="card-body">
                        <h5 class="card-title"><?= mb_substr($post['title'], 0, 50) . '...'?></h5>
                        <p class="card-text"><?= mb_substr($post['text'], 0, 40) . '...'?></p>
                        <p class="card-text"><?= mb_substr($post['createAt'], 0, 10)?></p>
                        <p class="card-text"><?= $post['username']?></p>
                        <a href="/?act=view&id=<?=$post['id']?>" class="btn btn-primary">View</a>
                     </div>
                  </div>
               </div>
         <?php endforeach;?>
      </div>
   </div>
</main>





<?php require_once INCS . '/footer.php';?>
</body>
</html>