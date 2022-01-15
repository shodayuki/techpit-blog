<?php
  include 'lib/connect.php';
  include 'lib/queryArticle.php';
  include 'lib/article.php';
  include 'lib/queryCategory.php';

  // Quryクラスのインスタンス生成、メニュー準備を追加
  $queryArticle = new QueryArticle();
  $queryCategory = new QueryCategory();

  // メニューの準備
  $monthly = $queryArticle->getMonthlyArchiveMenu();
  $category = $queryCategory->getCategoryMenu();

  $limit = 5;
  $page = 1;
  $month = null;
  $title = "";

  // ページ数の決定
  if (!empty($_GET['page']) && intval($_GET['page']) > 0) {
    $page = intval($_GET['page']);
  }

  // 月指定
  if (!empty($_GET['month'])) {
    $month = $_GET['month'];
    $title = $month.'の投稿一覧';
  }

  $pager = $queryArticle->getPager($page, $limit, $month);
?>
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
      <?php if (!empty($title)): ?>
        <h2><?php echo $title ?></h2>
      <?php endif ?>
      <?php if ($pager['articles']): ?>
        <?php foreach ($pager['articles'] as $article): ?>
          <article class="blog-post">
            <h2 class="blog-post-title">
              <a href="view.php?id=<?php echo $article->getId() ?>">
                <?php echo $article->getTitle() ?>
              </a>
            </h2>
            <p class="blog-post-meta"><?php echo $article->getCreatedAt() ?></p>
            <?php echo nl2br($article->getBody()) ?>
          </article>
        <?php endforeach ?>
      <?php else: ?>
        <div>
          <p>記事はありません。</p>
        </div>
      <?php endif ?>
      <?php if (!empty($pager['total'])): ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php for ($i = 1; $i <= ceil($pager['total'] / $limit); $i++): ?>
              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i ?><?php echo $month? '&month='.$month : '' ?>"><?php echo $i ?></a></li>
            <?php endfor ?>
          </ul>
        </nav>
      <?php endif ?>
    </div>
    <div class="col-md-4">
      <div class="p-4 mb-3 bg-light rounded">
        <h4>ブログについて</h4>
        <p class="mb-0">毎日のなんてことない日常を書いていきます。</p>
      </div>
      <div class="p-4">
        <h4>アーカイブ</h4>
        <ol class="list-unstyled mb-0">
          <?php foreach($monthly as $m): ?>
            <li><a href="index.php?month=<?php echo $m['month'] ?>"><?php echo $m['month'] ?>(<?php echo $m['count'] ?>)</a></li>
          <?php endforeach ?>
        </ol>
      </div>
      <div class="p-4">
        <h4>カテゴリ別アーカイブ</h4>
        <ol class="list-unstyled mb-0">
          <?php foreach ($category as $c): ?>
            <li><a href="index.php?category=<?php echo $c['id']? $c['id']: 0 ?>"><?php echo $c['name']? $c['name']: 'カテゴリーなし' ?>(<?php echo $c ['count'] ?>)</a></li>
          <?php endforeach ?>
        </ol>
      </div>
    </div>
  </div>
</main>
</body>
</html>