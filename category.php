<?php
  include('lib/secure.php');
  include('lib/connect.php');
  include('lib/queryCategory.php');

  $queryCategory = new QueryCategory();

  if (!empty($_POST['action']) && $_POST['action'] == 'add' && !empty($_POST['name'])) {
    $category = new Category();
    $category->setName($_POST['name']);
    $category->save();
  }

  // 登録されているカテゴリーを全て取得
  $categories = $queryCategory->findAll();
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
    }

    .bg-red {
      background-color: #ff6644 !important;
    }
  </style>
  <link rel="stylesheet" href="./css/blog.css">
</head>
<body>
<?php include('lib/nav.php'); ?>
<main class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>カテゴリー</h1>
      <h2>新規追加</h2>
      <form action="category.php" method="post" class="row">
        <input type="hidden" name="action" value="add">
        <div class="col-md-6">
          <input type="text" name="name" class="form-control">
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary">追加する</button>
        </div>
      </form>
      <hr>
      <?php if ($categories): ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>カテゴリー名</th>
              <th>編集</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $c): ?>
              <tr>
                <td><?php echo $c->getId() ?></td>
                <td><?php echo $c->getName() ?></td>
                <td><a href="category.php?action=edit&id=<?php echo $c->getId() ?>" class="btn btn-success">編集</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="alert alert-info">カテゴリーはまだ登録されていません。</div>
      <?php endif ?>
    </div>
  </div>
</main>
</body>
</html>