<?php include __DIR__ . '/../header.php';
/**
 * @var \MyProject\Models\Users\User $user
 */
$users = \MyProject\Models\Users\User::findAll();
?>
<body>
<div class="userContent">
    <h1>Users List</h1>
    <ul>
<?php if ($user->isAdmin()):?>
    <?php foreach ($users as $user1): ?>
        <li>
            <img src="https://via.placeholder.com/150">
            <h2>Nickname: <?= $user1->getNickname() ?></h2>
            <p>Email: <?= $user1->getEmail() ?></p>
            <p>Role: <?= $user1->getRole() ?></p>
            <p>Created: <?= $user1->getDate()?></p>
            <?php if ($user!==null && $user->isAdmin()):?>
                <p><a href="/users/<?= $user1->getId() ?>/edit" class="edit">Edit</a></p>
                <p><a href="/users/<?= $user1->getId() ?>/delete" class="delete">Delete</a></p>
            <?php endif;?>
        </li>
        <?php endforeach;?>
        <?php endif;?>
    </ul>
</div>
</body>
<?php include __DIR__ . '/../footer.php'; ?>