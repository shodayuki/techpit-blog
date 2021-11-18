<?php
  include 'lib/connect.php';

  // エラーメッセージ
  $err = null;

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $db = new connect();

    // 実行したいSQL
    $select = "SELECT * FROM users WHERE name=:name";

    // 第2引数でどのパラメータにどの変数を割り当てるかを決める
    $stmt = $db->query($select, array(':name' => $_POST['name']));

    // レコード1件を連想配列として取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($_POST['password'], $result['password'])) {
      // 結果が存在し、パスワードも正しい場合
      session_start();
      $_SESSION['id'] = $result['id'];
      header('Location: backend.php');
    } else {
      $err = "ログインできませんでした。";
    }
  }
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
  <link rel="stylesheet" href="./css/signin.css">
</head>
<body class="text-center">
<main class="form-signin">
  <form action="login.php" method="post">
    <h1 class="h3 mb-3 fw-normal">ログインする</h1>
    <?php
      if (!is_null($err)) {
        echo '<div class="alert alert-danger">'.$err.'</div>';
      }
    ?>
    <label class="visually-hidden">ユーザ名</label>
    <input type="text" name="name" class="form-control" placeholder="ユーザ名" required autofocus>
    <label class="visually-hidden">パスワード</label>
    <input type="password" name="password" class="form-control" placeholder="パスワード" required>
    <button class="w-100 btn btn-lg btn-primary" type="submit">ログインする</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>
</body>
</html>