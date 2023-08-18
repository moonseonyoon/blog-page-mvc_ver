<?php

// INDEX is responsible for connectng the MODEL and the VIEW
// COLLECTION OF FUNCTIONS 
require "./model/ArticleManager.php";
require "./model/CommentManager.php";

function showArticle($id)
{
    //  GET parameter for Article ID exists? Show a single article
    $articleManager = new ArticleManager();
    $commentManager = new CommentManager();
    $article = $articleManager->getArticle($id);
    $numComments = $commentManager->getNumComments($id);
    $comments = $commentManager->getComments($id);
    require "./view/articleView.php";
}

function showArticles()
{
    $articleManager = new ArticleManager();
    $articles = $articleManager->getArticles();
    require "./view/indexView.php";
}

function postComment($article_id, $author, $comment)
{
    $commentManager = new CommentManager();
    $commentManager->addComment($article_id, $author, $comment);
    header("Location: index.php?action=viewFullArticle&article=$article_id");
}

function getCommentsAJAX($article_id, $offset)
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($article_id, $offset); // TODO: pass in article_id and offset 
    foreach ($comments as $comment) {
        include "./view/component/commentCard.php";
    }
}
