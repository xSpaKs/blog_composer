<?php

require __DIR__ . "/../models/Article.php";

if (isset($_GET["id"]))
{
    if (ctype_digit($_GET["id"]) != "integer") {
        $_SESSION["message"] .= "<p style=\"color:red\">400 • The ID is not an integer</p>";
        http_response_code(400);
        header("Location:" . "../articles");
        exit;
    }

    $article = getArticle($_GET["id"]);

    if ($article == null) {
        $_SESSION["message"] .= "<p style=\"color: red\">404 • This article does not exist</p>";
        http_response_code(404);
        header("Location:" . "../articles");
        exit;
    }

    deleteArticle($_GET["id"]);
    $_SESSION["message"] .= "<p style=\"color: green\">Your article has successfully been deleted</p>";
    header("Location:" . "../articles");
} 

else 
{
    $_SESSION["message"] .= "<p style=\"color: red\">400 • There is no ID provided</p>";
    http_response_code(400);
    header("Location:" . "../articles");
    exit;
}

