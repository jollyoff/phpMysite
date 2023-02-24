<link rel="stylesheet" href="../../styles.css">
<?php
/**
 * @var \MyProject\Models\Articles\Article $article
 */
include __DIR__ . '/../header.php';
?>
    <h1 align="center">Edit News</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<div class="create-news">
    <form action="/articles/<?= $article->getId() ?>/edit" method="post">
        <label for="name">Title</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $article->getName() ?>" size="50"><br>
        <br>
        <label for="video">Video Link</label><br>
        <input type="text" name="video" id="video" value="<?= $_POST['video'] ?? $article->getVideo() ?>" size="80"><br>
        <br>
        <label for="text">Text of News</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? $article->getText() ?></textarea><br>
        <br>
        <input type="submit" value="Update">
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>