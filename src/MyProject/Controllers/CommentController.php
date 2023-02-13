<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenEception;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class CommentController extends AbstractController
{
    public function add(int $articleId): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment = Comment::createFromArray($_POST, $this->user, $articleId);
            } catch (\Exception $e) {
                $this->view->renderHtml('articles/view.php', [
                    'article' => Article::getById($articleId),
                    'error' => $e->getMessage()
                ]);

                return;

            }
            header('Location: /articles/' . $articleId, true, 302);
            exit();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => Article::getById($articleId),
        ]);
    }
    public function delete(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            throw new NotFoundException();
        } else {
            $comment = Comment::getById($commentId);
            $comment->delete();
            header('Location: /index.php');
        }

    }
    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /');
            exit();
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}