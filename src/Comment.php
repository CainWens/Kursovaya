<?php

namespace Geekbrains\Cainwens;

use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\Post;

class Comment
{
    private int $id;
    private User $idAuthor;
    private Post $idPost;
    private User $author;
    private string $text;

    public function __construct(
        int $id,
        User $idAuthor,
        Post $idPost,
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
        return $this->text;
    }
}