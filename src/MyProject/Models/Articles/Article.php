<?php

namespace MyProject\Models\Articles;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;
    /** @var string */
    protected $text;
    /** @var string */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
    public function getDate()
    {
        return (date('Y-m-d H:i:s'));
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDate()
    {
        $this->createdAt = $this->getDate();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Name of the news could not be empty');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Text of the news could not be empty');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    public function updateFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Name of the news could not be empty');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Text of the news could not be empty');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->setDate();

        $this->save();

        return $this;
    }

}