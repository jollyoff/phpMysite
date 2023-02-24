<link rel="stylesheet" href="../../styles.css">
<?php
/**
 * @var \MyProject\Models\Users\User $user
 */
include __DIR__ . '/../header.php';
$users = \MyProject\Models\Users\User::findOneByColumn('id',$user->getId());
?>
    <h1 align="center">Edit User</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<div class="create-news">
    <form action="/users/<?= $users->getId() ?>/edit" method="post">
        <label for="nickname">Nickname</label><br>
        <input type="text" name="nickname" id="nickname" value="<?= $_POST['nickname'] ?? $users->getNickname() ?>" size="50"><br>
        <br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? $users->getEmail() ?>" size="50"><br>
        <br>
        <label for="role">Role</label><br>
        <input type="text" name="role" id="role" value="<?= $_POST['name'] ?? $users->getRole() ?>" size="50"><br>
        <br>
        <input type="submit" value="Update">
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>