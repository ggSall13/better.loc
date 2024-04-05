<?php require_once INCS . '/header.php';

?>

<main class="main">
   <div class="container py-5">
      <h2>Autorisation</h2>
      <h3 class="error"> 
         <?php 
            if (!empty($error)) {
               foreach ($error as $v) {
                  echo $v;
               }
            }
         
         ?>
      </h3>
      <form action="" method="post">
         <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?= $email?>" id="email" placeholder="name@example.com">
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
         </div>
         <button type="submit" class="btn btn-dark">Done</button>
      </form>
      <hr>
      <div class="mb-3">
         <h4>Have no account?</h4>
         <a href="/?act=reg"><button class="btn btn-primary">Registration</button></a>
      </div>
   </div>
</main>


<?php require_once INCS . '/footer.php'?>