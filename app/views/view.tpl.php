<?php require_once INCS . '/header.php'?>

<main class="main">
   <div class="container py-3">
      <div class="col-md-12 py-3">
         <h2 class="view-title"><?= $post['title']?></h2>
      </div>
      <div class="col-md-12 py-3">
         <?php if ($post['imgPath']) :?>
            <img src="<?= URL_PATH . '/assets/' . $post['imgPath']?>" class="imageView" alt="<?= $post['title']?>">
         <?php else :?>
            <img src="https://mykaleidoscope.ru/x/uploads/posts/2022-09/1663158407_9-mykaleidoscope-ru-p-zlobnaya-ulibka-pinterest-12.jpg" class="imageView" alt="<?= $post['title']?>">
         <?php endif?>
      </div>
      <hr>
      <div class="col-md-12">
         <p><?= $post['text']?></p>
      </div>
      <hr>
      <h3>Your commentary:</h3>
      <form action="" method="post">
         <h3 class="error"><?php 
            if (!empty($error)) {
               foreach ($error as $v) {
                  echo $v;
               }
            }
         ?></h3>
         <?php if (empty($_SESSION['username'])) : ?>
            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Username</label>
               <input type="email" class="form-control" name="username" id="exampleFormControlInput1">
            </div>
         <?php endif?>
         <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Text of commentary</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
         <div class="mb-3">
            <button type="submit" name="addComment" class="btn btn-info">Ok</button>
         </div>
      </form>
      <hr>
      <h3>Comments:</h3>
         <?php foreach ($comments as $v) :?>
            <div class="comments_container">
               <div class="mb-3">User: <?= $v['username']?>:</div>
               <div class="mb-3"><?= $v['text']?></div>
            </div>
         <?php endforeach?>
   </div>
</main>



<?php require_once INCS . '/footer.php'?>