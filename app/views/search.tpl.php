<?php require_once INCS . '/header.php'?>



<main class="main">
   <div class="container">
      <div class="row">
         <?php foreach ($searchResult as $v) :?>
            <div class="col-md-3 py-3">
               <div class="card" style="width: 18rem;">
                  <a href="/?act=view&id=<?= $v['id']?>"><img src="<?= URL_PATH . "/assets/{$v['imgPath']}"?>" class="card-img-top" alt="<?= $v['title']?>"></a>
                  <div class="card-body">
                     <h5 class="card-title"><?= mb_substr($v['title'], 0, 30) . '...'?></h5>
                     <p class="card-text"><?= mb_substr($v['title'], 0, 30) . '...'?></p>
                     <a href="/?act=view&id=<?= $v['id']?>" class="btn btn-primary">View</a>
                  </div>
               </div>
            </div>
         <?php endforeach;?>
      </div>
   </div>
</main>





<?php require_once INCS . '/footer.php'?>
