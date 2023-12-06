<?php

function getArticle($id) {
    $articleFromBdd = null;

    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=blog", $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $query = "SELECT posts.id, posts.title, posts.body, posts.updated_at FROM posts WHERE posts.id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $id
    ]);

    if ($queryP->rowCount() == 1)
    {
        $articleFromBdd = $queryP->fetch(PDO::FETCH_ASSOC);
    }

    return $articleFromBdd;
}

function getAllArticles() {
    $articlesFromBdd = null;

    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=blog", $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $query = "SELECT posts.id, posts.title, posts.body, posts.updated_at FROM posts";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([]);

    $articlesFromBdd = $queryP->fetchAll(PDO::FETCH_ASSOC);

    return $articlesFromBdd;
}

function updateArticle($id, $title, $body) {
    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=blog", $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $query = "UPDATE `posts` SET `title`= ?, `body`= ?, updated_at = current_timestamp WHERE posts.id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $title,
        $body,
        $id
    ]);
}

function deleteArticle($id) {
    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=blog", $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $query = "DELETE FROM posts WHERE posts.id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $id
    ]);
}

function createArticle($title, $body) {
    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=blog", $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $query = "INSERT INTO `posts` (`title`, `body`) VALUES (?, ?)";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $title,
        $body
    ]);
}