<?php
  include 'lib/secure.php';
  include 'lib/connect.php';
  include 'lib/queryArticle.php';
  include 'lib/article.php';

  $title = ""; // タイトル
  $body = ""; // 本文
  $title_alert = ""; // タイトルのエラー文言
  $body_alert = ""; // 本文のエラー文言

  if (!empty($_POST['title']) && !empty($_POST['body'])) {
    // titleとbodyがPOSTメソッドで送信されたとき
    $title = $_POST['title'];
    $body = $_POST['body'];

    $article = new Article();
    $article->setTitle($title);
    $article->setBody($body);

    if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
      $article->setFile($_FILES['image']);
    }

    $article->save();

    header('Location: backend.php');
  } else if (!empty($_POST)) {
    // POSTメソッドで送信されたが、titleかbodyが足りない場合
    // 存在するほうは変数へ、ない場合空文字にしてフォームのvalueに設定する
    if (!empty($_POST['title'])) {
      $title = $_POST['title'];
    } else {
      $title_alert = "タイトルを入力してください。";
    }

    if (!empty($_POST['body'])) {
      $body = $_POST['body'];
    } else {
      $body_alert = "本文を入力してください。";
    }
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
<?php include('lib/nav.php'); ?>
<main class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>記事の投稿</h1>
      <form action="post.php" method="post">
        <div class="mb-3">
          <label class="mb-3">タイトル</label>
          <?php echo !empty($title_alert)? '<div class="alert alert-danger">'.$title_alert.'</div>':'' ?>
          <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">本文</label>
          <?php echo !empty($body_alert)? '<div class="alert alert-danger">'.$body_alert.'</div>':'' ?>
          <textarea name="body" rows="10" class="form-control"><?php echo $body; ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">画像</label>
          <input type="file" name="image" class="form-control">
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