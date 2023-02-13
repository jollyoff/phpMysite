<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Users\User $user
 */
$users = \MyProject\Models\Users\User::findAll();
?>
<?php if ($user->isAdmin()): {?>
    <?php foreach ($users as $user1): ?>
        <h2><?= $user1->getNickname() ?></h2>
        <p><?= $user1->getEmail() ?></p>
        <p><?= $user1->getRole() ?></p>
    <?php if ($user!==null && $user->isAdmin()):?>
        <p><a href="/users/<?= $user1->getId() ?>/edit">Edit</a></p>
        <p><a href="/users/<?= $user1->getId() ?>/delete">Delete</a></p>
        <hr color="darkgreen">
    <?php endif;?>
    <?php endforeach;?>
<?php } ?>
<?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>