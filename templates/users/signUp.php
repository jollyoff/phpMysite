<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Sign up</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form action="/users/register" method="post">
            <label>Nickname <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? '' ?>"></label>
            <br><br>
            <label>Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
            <br><br>
            <label>Password <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
            <br><br>
            <label>Password Confirm <input type="password" name="passwordconf" value="<?= $_POST['passwordconf'] ?? '' ?>"></label>
            <br><br>
            <input type="submit" value="Sign up">
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>