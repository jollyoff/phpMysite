<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\Services\UsersAuthService;


class UsersController extends AbstractController
{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function getUsersInfo(): void
    {
        $this->view->renderHtml('users/main.php');
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }

    public function logOut()
    {
        UsersAuthService::deleteToken();
        header('Location: /');
    }

    public function delete(int $userId): void
    {
        $comment = User::getById($userId);
        if ($comment === null) {
            throw new NotFoundException();
        } else {
            $comment = User::getById($userId);
            $comment->delete();
            header('Location: /index.php');
        }

    }
    public function edit(int $userId): void
    {
        $userId = User::getById($userId);
        if ($userId === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $userId->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/edit.php', ['error' => $e->getMessage(), 'user' => $userId]);
                return;
            }

            header('Location: /');
            exit();
        }

        $this->view->renderHtml('users/edit.php', ['user' => $userId]);
    }

    
}