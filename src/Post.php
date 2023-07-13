<?php

namespace Geekbrains\Cainwens;

use Geekbrains\Cainwens\User;

class Post
{
    private int $id;
    private int $idAuthor;
    private User $author;
    private string $title;
    private string $text;


    /**
     * Summary of __construct
     * @param int $id id статьи
     * @param int $idAuthor id автора
     * @param \Geekbrains\Cainwens\User $author автор
     * @param string $title заголовок
     * @param string $text текст статьи
     */
    public function __construct(
        int $id,
        int $idAuthor,
        User $author,
        string $title,
        string $text
    ) {
        $this->id = $id;
        $this->idAuthor = $idAuthor;
        $this->author = $author;
        $this->title = $title;
        $this->text = $text;
    }

    public function __toString(): string
    {
        return $this->title . '>>>' . $this->text . PHP_EOL;
    }

    /**
     * Get the value of idAuthor
     */
    public function getIdAuthor(): string
    {
        return $this->idAuthor;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}