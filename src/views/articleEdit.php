<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit an article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Edit an article</h1>
    <?=isset($_SESSION["message"]) ? $_SESSION["message"] : ""; $_SESSION["message"] = ""?>
    <a href="/blog/articles">List of articles</a>

    <form action="update" method="post">
        <div>
            <label for="title">Title : </label>
            <input type="text" name="title" value=<?=isset($_SESSION["old_input"]["title"]) ? $_SESSION["old_input"]["title"] : $article["title"]?>>
        </div>

        <div>
            <label for="body">Body : </label>
            <textarea name="body"><?=isset($_SESSION["old_input"]["body"]) ? $_SESSION["old_input"]["body"] : $article["body"]?></textarea>
        </div>

        <input type="hidden" name="id" value="<?=$_GET["id"]?>">

        <input type="submit">
    </form>
</body>
</html>