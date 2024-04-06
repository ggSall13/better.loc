<?php require_once INCS . '/header.php'; ?>


<main class="main">
   <div class="form_container py-5">
      <h2 class="error">
         <?php 
            if (!empty($error)) {
               foreach ($error as $v) {
                  echo $v;
               } 
            }
         ?>
      </h2>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="col-md-12 py-2">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control form-post" name="title" placeholder="title" value="<?= $post['title']?>" id="title">
         </div>
         <div class="col-md-12 py-2">
            <label for="text" class="form-label">Text</label>
            <textarea type="text" name="text" class="form-control form-post" rows="3" placeholder="text" id="text"><?= $post['text']?></textarea>
         </div>
         <div class="col-md-12 py-2">
            <button class="btn btn-info">Done</button>
         </div>
         
      </form>
   </div>
</main>


<?php require_once INCS . '/footer.php'; ?>
