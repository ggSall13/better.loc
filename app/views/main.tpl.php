<?php require_once INCS . '/header.php';?>

<main class="main py-3">
   <div class="container content">
      <div class="Better_call_Saul">
         <h2 class="py-2">Better call Saul</h2>
         <img src="https://i.pinimg.com/originals/d4/72/80/d472809847040c741976c7cd07cc3568.jpg" class="img-fluid better_call_img" alt="better call saul">
         <p class="better_call_text">
            Hi, I'm Saul Goodman. Did you know that you have rights? The Constitution says 
            that there is. And I agree with her! I believe that every man, woman, or child in America is 
            innocent until proven otherwise. That's why I'm fighting for you, Albuquerque!
            Better call Saul!
         </p>
      </div>
      <hr>
      <h2 class="py-3 text-center">POSTS</h2> 
      <div class="row">
         <?php foreach ($posts as $post) :?>
               <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                     <a href="/?act=view&id=<?=$post['id']?>"><img src="https://i.pinimg.com/originals/7c/11/de/7c11dea46b3b915460e750a9f43e7498.jpg" class="card-img-top" alt="title"></a>
                     <div class="card-body">
                        <h5 class="card-title"><?= mb_substr($post['title'], 0, 50) . '...'?></h5>
                        <p class="card-text"><?= mb_substr($post['text'], 0, 40) . '...'?></p>
                        <p class="card-text"><?= mb_substr($post['createAt'], 0, 10)?></p>
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