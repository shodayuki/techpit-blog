<?php

class QueryArticle extends connect {
  private $article;

  public function __construct()
  {
    parent::__construct();
  }

  public function setArticle(Article $article) {
    $this->article = $article;
  }

  public function save() {
    if ($this->article->getId()) {
      // IDがあるときは上書き
    } else {
      // IDがなければ新規作成
      $title = $this->article->getTitle();
      $body = $this->article->getBody();
      $stmt = $this->dbh->prepare("INSERT INTO articles (title, body, created_at, updated_at) VALUES (:title, :body, NOW(), :NOW())");
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      $stmt->bindParam(':body', $body, PDO::PARAM_STR);
      $stmt->execute();
    }
  }
}