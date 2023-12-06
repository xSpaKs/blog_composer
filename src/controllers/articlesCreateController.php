<?php

require __DIR__ . "/../models/Article.php";
use Respect\Validation\Validator as v;

$isValidTitle = v::notEmpty()->validate($_POST["title"]);
$isValidBody = v::notEmpty()->validate($_POST["body"]);

if ($isValidTitle && $isValidBody)
{
    createArticle($_POST["title"], $_POST["body"]);
    
    $_SESSION["message"] .= "<p style=\"color:green\">Your article has successfully been created</p>";
    header("Location:" . "../articles");
    exit;
}

else 
{    
    $_SESSION["message"] .= "<p style=\"color:red\">Title and body values are required to create an article</p>";
}

require __DIR__ . "/../views/articleCreate.php"; 