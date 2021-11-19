<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Backend</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <style>
    body {
      padding-top: 5rem;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }

      .bg-red {
        background-color: #FF6644 !important;
      }
    }
  </style>
  <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-red fixed-top">
  <div class="container">
    <a href="/" class="navbar-brand">My Blog Backend</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item"><a href="#" class="nav-link">記事を書く</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">ログアウト</a></li>
      </ul>
    </div>
  </div>
</nav>
<main class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>記事の投稿</h1>
      <form action="post.php" method="post">
        <div class="mb-3">
          <label class="mb-3">タイトル</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">本文</label>
          <textarea name="body" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">投稿する</button>
        </div>
      </form>
    </div>
  </div>
</main>
</body>
</html>