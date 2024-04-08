<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?? 'Game blog'?></title>

   <!-- bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <!-- css -->
   <link rel="stylesheet" href="assets/css/main.css">
   <!-- fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
   <header class="header">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
         <div class="container">
            <a class="navbar-brand" href="/"><img src="" alt="">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" href="/?act=about">About</a>
               </li>
               <li class="nav-item">
                  <?php if (empty($_SESSION)) :?>
                  <a class="nav-link" href="/?act=login">Log In</a>
               </li>
                  <li><a class="nav-link" href="/?act=reg">Registration</a></li>
                     <?php else :?> 
                        <a class="nav-link" href="/?act=profile"><?= $_SESSION['username']?></a>
                     </li>
                     <?php endif;?>
               </ul>
               <form class="d-flex" role="search" method="post" action="/?act=search">
                  <input class="form-control me-2" type="search" name="searchText" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" name="searchBtn" type="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>
</header>