<?php

namespace MyProject\Models\Comments;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    protected string $text;

    protected int $authorId;

    protected int $articleId;

    protected string|null $createdAt = null;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDate()
    {
        return (date('Y-m-d H:i:s'));
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function setAuthor(User $author): Comment
    {
        $this->authorId = $author->getId();

        return $this;
    }
    public function setDate()
    {
        $this->createdAt = $this->getDate();
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticle(Article $article): Article
    {
        return Article::getById($this->articleId);
    }

    public function setArticle(Article $article): self
    {
        $this->articleId = $article->getId();

        return $this;
    }

    public static function createFromArray(array $fields, User $author, int $articleId): Comment
    {
        if (empty($fields['text'])) {
            throw new \InvalidArgumentException('Text could not be empty');
        }

        $article = Article::getById($articleId);

        if (!$article) {
            throw new \Exception(sprintf('Article with %s = id not found', $articleId));
        }

        $comment = new Comment();

        $comment
            ->setText($fields['text'])
            ->setArticle($article)
            ->setAuthor($author)
            ->setDate();

        $comment->save();

        return $comment;
    }
    public function updateFromArray(array $fields): Comment
    {
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Comment could not be empty ');
        }
        $this->setText($fields['text']);
        $this->setDate();
        $this->save();

        return $this;
    }
}