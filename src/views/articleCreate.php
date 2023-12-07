<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Create an article</h1>   
    <?php
    ?>
    <?=isset($_SESSION["message"]) ? $_SESSION["message"] : ""; $_SESSION["message"] = ""?> 
    <a href="/blog/articles">List of articles</a>
    
    <form action="" method="post">
        <div>
            <label for="title">Title : </label>
            <textarea name="title"><?=isset($_POST["title"]) ? $_POST["title"] : ""?></textarea>
        </div>

        <div>
            <label for="body">Body : </label>
            <textarea name="body"><?=isset($_POST["body"]) ? $_POST["body"] : ""?></textarea>
        </div>

        <input type="submit">
    </form>
</body>
</html>