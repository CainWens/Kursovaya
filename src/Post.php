<?php

namespace Geekbrains\Cainwens;

use Geekbrains\Cainwens\User;

class Post
{
    private UUID $uuid;
    private User $author;
    private string $title;
    private string $text;


    /**
     * Summary of __construct
     * @param UUID $uuid id статьи
     * @param \Geekbrains\Cainwens\User $author автор
     * @param string $title заголовок
     * @param string $text текст статьи
     */
    public function __construct(
        UUID $uuid,
        User $author,
        string $title,
        string $text
    ) {
        $this->uuid = $uuid;
        $this->author = $author;
        $this->title = $title;
        $this->text = $text;
    }

    public function __toString(): string
    {
        return 'Запись у ' . $this->author->fullName() . PHP_EOL . $this->title . ' >>> ' . $this->text . PHP_EOL;
    }

    /**
     * Get the value of idAuthor
     */
    public function getAuthor(): string
    {
        return $this->author->uuid();
    }

    /**
     * Get the value of uuid
     */
    public function uuid()
    {
        return $this->uuid;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }
}