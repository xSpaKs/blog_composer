<?php

require __DIR__ . "/../models/Article.php";
use Respect\Validation\Validator as v;

$isValidTitle = v::notEmpty()->validate($_POST["title"]);
$isValidBody = v::notEmpty()->validate($_POST["body"]);

$_SESSION["old_input"] = $_POST;

if ($isValidTitle && $isValidBody)
{
    updateArticle(intval($_POST["id"]), $_POST["title"], $_POST["body"]);

    $_SESSION["message"] .= "<p style=\"color:green\">Your article has successfully been updated</p>";
    header("Location:" . "../articles?id=" . intval($_POST["id"]));
    exit;
}

else 
{    
    $_SESSION["message"] .= "<p style=\"color:red\">Title and body values are required to edit an article</p>";
    header("Location:" . "edit?id=" . $_POST["id"]);
    exit;
}