<?php

namespace Geekbrains\Cainwens;

use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\Post;

class Comment
{
    private int $id;
    private int $idAuthor;
    private int $idPost;
    private User $author;
    private string $text;

    public function __construct(
        int $id,
        int $idAuthor,
        int $idPost,
        User $author,
        string $text
    ) {
        $this->id = $id;
        $this->idAuthor = $idAuthor;
        $this->idPost = $idPost;
        $this->author = $author;
        $this->text = $text;
    }



    /**
     * Get the value of text
     */
    public function __toString(): string
    {
        return $this->author . ' Комментирует > ' . $this->text;
    }
}