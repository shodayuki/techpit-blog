<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
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
    }
  </style>
  <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">My Blog</a>
  </div>
</nav>
<main class="container">
  <div class="row">
    <div class="col-md-8">
      <article class="blog-post">
        <h2 class="blog-post-title">記事タイトル</h2>
        <p class="blog-post-meta">2021/xx/xx</p>
        <p>本文がここに入ります。</p>
      </article>
      <article class="blog-post">
        <h2 class="blog-post-title">記事タイトル2</h2>
        <p class="blog-post-meta">2021/xx/xx</p>
        <p>本文がここに入ります。</p>
      </article>
    </div>
    <div class="col-md-4">
      <div class="p-4 mb-3 bg-light rounded">
        <h4>ブログについて</h4>
        <p class="mb-0">毎日のなんてことない日常を書いていきます。</p>
      </div>
      <div class="p-4">
        <h4>アーカイブ</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">2021/06</a></li>
          <li><a href="#">2021/05</a></li>
          <li><a href="#">2021/04</a></li>
        </ol>
      </div>
    </div>
  </div>
</main>
</body>
</html>