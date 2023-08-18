<?php

require_once "Manager.php";
class ArticleManager extends Manager
{
    public function getArticles()
    {   // $this-> is necessary because dbConnect() is 
        // an internal function of this class 
        $db = $this->dbConnect();
        // We retrieve the 5 last articles
        $req = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 5');
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    // getting only one article 
    // plural and singular words stand out 
    public function getArticle($article_id)
    {
        $db = $this->dbConnect();

        // retrieve the article
        $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($article_id));
        $article = $req->fetch(PDO::FETCH_ASSOC);

        return $article;
    }
}
