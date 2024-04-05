<?php require_once INCS . '/header.php';

?>

<main class="main">
   <div class="container py-5">
      <h2>Registration</h2>
      <h3 class="error">
         <?php if (!empty($error)) {
            foreach ($error as $v) {
               echo $v;
            }
         }
         ?>
      </h3>
      <form action="" method="post">
         <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $email?>" placeholder="name@example.com">
         </div>
         <div class="mb-3">
            <label for="username" class="form-label">Your Username</label>
            <input type="text" name="username" class="form-control" id="username" value="<?= $username?>" placeholder="username">
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="password">
         </div>
         <div class="mb-3">
            <label for="repPassword" class="form-label">Repeat your Password</label>
            <input type="password" name="repPassword" class="form-control" id="repPassword" placeholder="repeat your password">
         </div>
         <button type="submit" class="btn btn-dark">Done</button>
      </form>
   </div>
</main>


<?php require_once INCS . '/footer.php'?>