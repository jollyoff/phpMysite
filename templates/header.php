<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>php my site</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body bgcolor="#d8bfd8">

<table class="layout">
    <tr bgcolor="#d8bfd8">
        <td colspan="2" class="header">
            <a href="/">News</a>
        </td>
    </tr>
    <tr bgcolor="#d8bfd8">
        <td colspan="2" style="text-align: right">
            <?php if (!empty($user)) { ?>
                Hello, <?= $user->getNickname() ?> | <a href="/users/logout">Exit</a>
            <?php } else { ?>
                <a href="/users/login">Sign in</a> | <a href="/users/register">Sign up</a>
            <?php } ?>
        </td>
    </tr>
    <tr bgcolor="#d8bfd8">
        <td>