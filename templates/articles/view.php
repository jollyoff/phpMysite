<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Articles\Article $article
 * @var \MyProject\Models\Users\User $user
 * @var \MyProject\Models\Comments\Comment $comment
 * @var array $comments
 * @var array $users
 */
?>
<?php if($user != null): ?>
    <link rel="stylesheet" href="../../styles.css">
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Author: <?= $article->getAuthor()->getNickname() ?></p>

    <?php if ($user!==null && $user->isAdmin() or $article->getAuthor()->getId() == $user->getId()):?>
    <p><a href="/articles/<?= $article->getId() ?>/edit">Edit</a></p>
    <p><a href="/articles/<?= $article->getId() ?>/delete">Delete</a></p>
    <?php endif?>
    <hr color="darkgreen">
    <p align="center">Comments: </p>
    <hr color="darkgreen">
    <?php foreach ($comments as $comment): ?>
    <p><h><?=$comment->getAuthor()->getNickname() ?>:</h> <?= $comment->getText() ?></p>
    <p align="right"><?= $comment->getCreatedAt() ?></p>
    <?php if ($user!==null && $user->isAdmin() or $comment->getAuthor()->getId() == $user->getId()):?>
    <p><a href="/articles/<?= $comment->getId() ?>/comments/edit">Edit</a></p>
    <p><a href="/articles/<?= $comment->getId() ?>/comments/delete">Delete</a></p>
    <?php endif;?>
    <hr color="darkgreen">
<?php endforeach; ?>
<?php if ($user!==null):?>
    <form action="/articles/<?= $article->getId()?>/comments/add" method="post">
        <br>
        <label for="text">Add comment</label><br>
        <textarea name="text" id="text" rows="5" cols="90"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Add">
    </form>
<?php endif?>
<?php endif;?>
<?php if($user == null): ?>
<p>Ви не залогінені<a href="../users/login.php"> зайдіть в аккаунт</a></p>
<?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>