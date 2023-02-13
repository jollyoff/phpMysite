<?php

return [
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/comments/edit$~' => [\MyProject\Controllers\CommentController::class, 'edit'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^articles/add~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/login~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/logout~' => [\MyProject\Controllers\UsersController::class, 'logOut'],
    '~^articles/(\d+)/comments/add$~' => [\MyProject\Controllers\CommentController::class, 'add'],
    '~^articles/(\d+)/comments/delete$~' => [\MyProject\Controllers\CommentController::class, 'delete'],
    '~^users/(\d+)/edit$~' => [\MyProject\Controllers\UsersController::class, 'edit'],
    '~^users/(\d+)/delete$~' => [\MyProject\Controllers\UsersController::class, 'delete'],
    '~^users/main$~' => [\MyProject\Controllers\UsersController::class, 'getUsersInfo'],
];