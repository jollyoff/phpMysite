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
<div class="news">
    <h2><?= $article->getName() ?></h2>
    <p>Author: <?= $article->getAuthor()->getNickname() ?></p>
    <p><?= $article->getText() ?></p>
    <p><?= $article->getDate() ?></p>
    <?php if(!empty($article->getVideo())): ?>
    <iframe width="560" height="315" src="<?= $article->getVideo() ?>" title="YouTube video player"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <?php endif; ?>
    <?php if ($user!==null && $user->isAdmin() or $article->getAuthor()->getId() == $user->getId()):?>
    <p><a class="edit" href="/articles/<?= $article->getId() ?>/edit">Edit</a>
        <a class="delete" href="/articles/<?= $article->getId() ?>/delete">Delete</a></p>
    <?php endif?>
</div>
    <?php if ($user!==null):?>
        <form action="/articles/<?= $article->getId()?>/comments/add" method="post">
            <div class="comment-form">
                <label for="text">Add comment</label>
            </div>
            <div class="form-group">
                <textarea name="text" id="text" required><?= $_POST['text'] ?? '' ?></textarea>
            </div>
            <input type="submit" value="Add">
        </form>
    <?php endif?>
<div class="comments">
    <h2><div id="result"></div></h2>
    <ul class="comment-list">
            <?php foreach ($comments as $comment): ?>
        <li class="comment">
            <div class="comment-content">
            <h4><?=$comment->getAuthor()->getNickname() ?></h4>
                <p><?= $comment->getText() ?></p>
            <span class="comment-date"><?= $comment->getCreatedAt() ?></span>
                <?php if ($user!==null && $user->isAdmin() or $comment->getAuthor()->getId() == $user->getId()):?>
                    <p><a class="edit" href="/articles/<?= $comment->getId() ?>/comments/edit">Edit</a>
                        <a class="delete" href="/articles/<?= $comment->getId() ?>/comments/delete">Delete</a></p>
                <?php endif;?>
            </div>
        </li>
        </ul>
        </div>
    <div class="comment-functions">

    </div>
        <?php endforeach; ?>
<?php endif;?>
<script>
    var text = "Comments";
    var delay = 75;
    var elem = document.getElementById("result");

    var print_text = function(text, elem, delay) {
        if(text.length > 0) {
            elem.innerHTML += text[0];
            setTimeout(
                function() {
                    print_text(text.slice(1), elem, delay);
                    }, delay
                );
            }
        }
    print_text(text, elem, delay);
</script>
<?php if($user == null): ?>
<p>Ви не залогінені зайдіть в аккаунт</p>
<?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>