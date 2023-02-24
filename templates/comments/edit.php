<link rel="stylesheet" href="../../styles.css">
<?php
/**
 * @var \MyProject\Models\Comments\Comment $comment
 */
include __DIR__ . '/../header.php';
?>
<div class="create-news">
    <h1 align="center">Edit Comment</h1>
    <?php if(!empty($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>
    <div class="create-news">
        <form action="/articles/<?= $comment->getId() ?>/comments/edit" method="post">
            <label for="text">Text Comment</label><br>
            <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? $comment->getText() ?></textarea><br>
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>