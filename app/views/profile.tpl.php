<?php require_once INCS . '/header.php';
?>


<main class="main">
   <div class="container">
      <hr>
      <div class="col-md-12 py-3">
         <h2><?= $user['username'] ?></h2>
      </div>
      <div class="col-md-12">
         <h3>Your posts:</h3>
            <?php if (!$posts) :?>
                  <h3>Have no posts</h3>
                  <a href="/?act=add"><button class="btn btn-primary">Add post</button></a>
            <?php else :?> 
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">id</th>
                  <th scope="col">Title</th>
                  <th scope="col">create Date</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($posts as $key => $post)?>
               <tr>
                  <th scope="row"><?= $key + 1?></th>
                  <td><?= mb_substr($post['title'], 0, 50) . '...'?></td>
                  <td><?= $post['createAt']?></td>
                  <td>
                     <a href="/?act=edit&id=<?=$post['id']?>"><button class="btn btn-success">Edit</button></a>
                     <a href="/?act=delete&id=<?=$post['id']?>"><button class="btn btn-danger">Delete</button></a>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php endif;?>
      </div>
      <hr>
      <h3 class="py-3">Manage Profile</h3>
         <div class="col-mb-12">
            <a href="/?act=add"><button class="btn btn-primary">Add post</button></a>
            <a href="/?act=logout"><button class="btn btn-danger">Logout</button></a>
         </div>
   </div>
</main>


<?php require_once INCS . '/footer.php'; ?>
