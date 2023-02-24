<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>PhpMySite</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="/" class="navbar-brand">News site</a>
        <div class="navbar-wrap">
            <ul class="navbar-menu">
                <?php if (!empty($user)): ?>
                    <li><a href="/articles/add">Add News</a></li>
                        <?php if ($user->isAdmin()): ?>
                            <li><a href="/users/main">Users</a></li>
                        <?php endif;?>
                <?php endif;?>
            </ul>
            <?php if (!empty($user)): ?>
                <a href="/users/logout" class="exit">Exit</a>
            <?php endif;?>
            <?php if (empty($user)): ?>
                <button id="registration-button" class="">Registration</button>
                <div id="registration-window" class="popup">
                    <div class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                        </div>
                        <div class="popup-body">
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
                        </div>
                    </div>
                </div>
                <button id="login-button" class="">Login</button>
                <div id="login-window" class="popup-login">
                    <div class="popup-content-login">
                        <div class="popup-header-login">
                            <span class="close-login">&times;</span>
                        </div>
                        <div class="popup-body-login">
                            <h1>Sign in</h1>
                            <form action="/users/login" method="post">
                                <?php if (!empty($error)): ;?>
                                    <div id="error" style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
                                <?php endif; ?>
                                <label>Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
                                <br><br>
                                <label>Password <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
                                <br><br>
                                <input id="submitButtonLogin" type="submit" value="Sign in">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</nav>
<script>
    loginButton = document.getElementById("login-button");
    loginWindow = document.getElementById("login-window");
    loginClose = document.querySelector('.close-login');
    registrationButton = document.getElementById("registration-button");
    registrationWindow = document.getElementById("registration-window");
    registrationClose = document.querySelector('.close');

    loginButton.onclick = function (){
        loginWindow.style.display = "block";
    }

    loginClose.onclick = function (){
        loginWindow.style.display= "none";
    }

    registrationButton.onclick = function()
    {
        registrationWindow.style.display = "block";
    };

    registrationClose.onclick = function (){
        registrationWindow.style.display = "none";
    }

    window.onclick = function(e) {
        if(e.target === registrationWindow){
            registrationWindow.style.display = "none";
        }
        if(e.target === loginWindow){
            loginWindow.style.display = "none";
        }
    }
</script>
</body>
</html>
