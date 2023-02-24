<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Articles\Article $articles
 * @var \MyProject\Models\Users\User $user
 * @var \MyProject\Models\Comments\Comment $comment
 * @var array $comments
 */
?>
    <link rel="stylesheet" href="../../styles.css">
    <body>
    <div class="grid">
<?php foreach ($articles as $article): ?>
    <div class="article-body">
        <h2 class="article-title"><a href="/articles/<?= $article->getId() ?>">
            <?= $article->getName() ?>
            </a></h2>
        <p class="article-content">
            <?= $article->getText() ?>
        </p>
        <footer class="article-info">
            <span>By <?= $article->getAuthor()->getNickname()?></span>
            <span>
                Comments:
                <?php $number = $article->getNumberComments($article);
                $commentsNumber = reset($number);
                $count = $commentsNumber->{'cOUNT(*)'};
                echo($count);
                ?>
            </span>
        </footer>
    </div>
<?php endforeach; ?>
    </div>
    </body>
<?php include __DIR__ . '/../footer.php'; ?>