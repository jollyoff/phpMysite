<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Articles\Article $articles
 */
?>
    <h1>Create Comment</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
    <form action="/articles/<?= $articles->getId()?>/comment" method="post">
        <label for="comment">Text Comment</label><br>
        <textarea name="comment" id="comment" rows="10" cols="80"><?= $_POST['comment'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Post">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>