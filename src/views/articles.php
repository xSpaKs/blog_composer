<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<?php
    if (isset($article))
    { ?>
        <h1>Article <?=$article["id"]?>
        </h1>
    <?php }
    else
    { ?>
        <h1>List of articles</h1>
    <?php }
    ?>
    
    <?=isset($_SESSION["message"]) ? $_SESSION["message"] : ""; $_SESSION["message"] = ""?>
    <?php
    if (isset($article))
    { ?>
        <a href="/blog/articles">List of articles</a>
    <?php }
    ?>
    <a href="/blog/articles/create">Create an article</a>

    <?php        
    if (isset($article)) 
    
        { ?>
            <div>
                <h3>Article <?=$article["id"]?></h3>
                <p><strong>Date : </strong><?=ucfirst($carbon->parse($article["updated_at"])->locale('fr_FR')->diffForHumans()) ?></p>
                <p><strong>Title : </strong> <?=$parsedown->text($article["title"])?></p>
                <p> <strong>Body : </strong><?=$parsedown->text($article["body"])?></p>
                <a href="/blog/articles/edit?id=<?= $article["id"] ?>">Edit this article</a>
                <a href="/blog/articles/delete?id=<?= $article["id"] ?>">Delete this article</a>
            </div>
        <?php }
        else if (count($articles) == 0) { ?>
            <p>There is no articles yet</p>
        <?php }

        else 
        {
            for ($i = 0; $i < count($articles); $i++) 
            { ?>
                <div>
                    <p>-----------------------------------------------</p>
                    <h3>Article <?=$articles[$i]["id"]?></h3>
                    <p><strong>Date : </strong><?=
                    ucfirst($carbon->parse($articles[$i]["updated_at"])->locale('fr_FR')->isoFormat('LLLL')) ?>
                    </p>
                    <p><strong>Title : </strong><?=$parsedown->text($articles[$i]["title"])?></p>
                    <p><strong>Body : </strong><?=$parsedown->text($articles[$i]["body"])?></p>
                    <a href="/blog/articles/edit?id=<?= $articles[$i]["id"] ?>">Edit this article</a>
                    <a href="/blog/articles/delete?id=<?= $articles[$i]["id"] ?>">Delete this article</a>
                </div>
        <?php } }?>
        
</body>
</html>