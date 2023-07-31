<?php

namespace Geekbrains\Cainwens;

use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\Post;

class Comment
{
    private UUID $uuid;
    private Post $post;
    private User $author;
    private string $text;

    public function __construct(
        UUID $uuid,
        Post $post,
        User $author,
        string $text
    ) {
        $this->uuid = $uuid;
        $this->post = $post;
        $this->author = $author;
        $this->text = $text;
    }



    /**
     * Get the value of text
     */
    public function __toString(): string
    {
        return $this->author->fullName() . ' комментирует > ' . $this->text . PHP_EOL;
    }

    /**
     * Get the value of uuid
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * Get the value of idPost
     */
    public function getPost(): string
    {
        return $this->post->uuid();
    }

    /**
     * Get the value of author
     */
    public function getAuthor(): string
    {
        return $this->author->uuid();
    }

    /**
     * Get the value of text
     */
    public function getText(): string
    {
        return $this->text;
    }
}