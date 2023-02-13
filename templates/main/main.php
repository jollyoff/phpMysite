<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Articles\Article $articles
 * @var \MyProject\Models\Users\User $users
 */
?>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
    <p><?= $article->getText() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>