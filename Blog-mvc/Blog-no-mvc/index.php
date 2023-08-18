<?php

// MVC: model, view, controller 

// ROUTER - Directs Traffic 

// require will run the php file, however if there is an error, it would stop running the whole page entirely
// include on the otherhand, will show an error but other pages that don't have an error, will run normally
// require "./model/model.php";


require "./controller/controller.php";

try {

    // index.php?action=something...
    $action = $_GET['action'] ?? "";
    // $action = $_GET['action'] ? $_GET['action'] : ""; 

    switch ($action) {
            // all possible action values should have a CASE 
        case "viewFullArticle":
            if (isset($_GET['article']) and $_GET['article'] > 0) {
                showArticle($_GET['article']);
            } else {
                throw new Exception("Missing valid article id");
            }
            break;

        case "postComment":
            if (!empty($_POST)) {
                $article_id = $_POST['article'] ?? "";
                $author = $_POST['name'] ??  "";
                $comment = $_POST['comment'] ?? "";
                if ($article_id and $author and $comment) {
                    postComment($article_id, $author, $comment);
                } else {
                    throw new Exception("Missing required information.");
                }
            } else {
                throw new Exception("Form not submitted");
            }
            break;
        case "getCommentsAJAX":
            if (isset($_GET['article']) and isset($_GET['offset'])) {
                getCommentsAJAX($_GET['article'], $_GET['offset']);
            } else {
                echo "400: Missing required parameters.";
            }
            break;

        default:
            showArticles();
            break;
    }
} catch (Exception $e) {
    // This code will ONLY run if an exception occurred 
    echo "ERROR!<br>";
    echo $e->getMessage();
}
