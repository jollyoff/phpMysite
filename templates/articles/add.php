<link rel="stylesheet" href="../../styles.css">
<?php include __DIR__ . '/../header.php'; ?>
    <h1 align="center">Create News</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<div class="create-news">
    <form action="/articles/add" method="post">
        <label for="name">Title</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
        <br>
        <label for="video">Video Link</label><br>
        <input type="text" name="video" id="video" value="<?= $_POST['video'] ?? '' ?>" size="80"><br>
        <br>
        <label for="text">Text News</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Create">
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>