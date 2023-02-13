<?php
/**
 * @var \MyProject\Models\Users\User $user
 */
include __DIR__ . '/../header.php';
$users = \MyProject\Models\Users\User::findOneByColumn('id',$user->getId());
var_dump($user);
?>
    <h1>Edit User</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
    <form action="/users/<?= $users->getId() ?>/edit" method="post">
        <label for="name">Nickname</label><br>
        <input type="text" name="nickname" id="nickname" value="<?= $_POST['nickname'] ?? $users->getNickname() ?>" size="50"><br>
        <br>
        <label for="name">Email</label><br>
        <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? $users->getEmail() ?>" size="50"><br>
        <br>
        <label for="name">Role</label><br>
        <input type="text" name="role" id="role" value="<?= $_POST['name'] ?? $users->getRole() ?>" size="50"><br>
        <br>
        <input type="submit" value="Update">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>