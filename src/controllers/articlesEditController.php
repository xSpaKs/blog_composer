<?php

require __DIR__ . "/../models/Article.php";
use Respect\Validation\Validator as v;

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
        $_SESSION["message"] .= "<p style=\"color:red\">404 • The article does not exist</p>";
        http_response_code(404);
        header("Location:" . "../articles");
        exit;
    }
} 

else 
{
    $_SESSION["message"] .= "<p style=\"color:red\">400 • There is no article</p>";
    http_response_code(400);
    header("Location:" . "../articles");
    exit;
}

$parsedown = new Parsedown();

require __DIR__ . "/../views/articleEdit.php"; 