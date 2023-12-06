<?php

require __DIR__ . "/../vendor/autoload.php";

session_start();

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$url = $_SERVER['REQUEST_URI'];
$url = explode("blog", $url)[1];
$url = explode("?", $url)[0];
$url = str_replace("/public", "", $url);

switch($url)
{
    case '/articles' :
        include '../src/controllers/articlesController.php';
        break;

    case '/articles/create' : 
        include '../src/controllers/articlesCreateController.php';
        break;

    case '/articles/edit' : 
        include '../src/controllers/articlesEditController.php';
        break;

    case '/articles/delete' : 
        include '../src/controllers/articlesDeleteController.php';
        break;

    case '/articles/update' :
        include '../src/controllers/articlesUpdateController.php';
        break;

    default : 
        include '../src/controllers/articlesController.php';
        break;
    }


