<?php
namespace Geekbrains\Cainwens\Repositories\PostRepository;

use Geekbrains\Cainwens\Exeptions\PostNotFound;
use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\UUID;
use \PDO;
use Geekbrains\Cainwens\Post;

class PostsRepositoryInterface
{
    public function __construct(private PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Post $post): void
    {
        // Подготавливаем запрос
        $statement = $this->connection->prepare(
            'INSERT INTO posts (uuid, author, title, text) VALUES (:uuid, :author, :title, :text)'
        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':uuid' => $post->uuid(),
            ':author' => $post->getAuthor(),
            ':title' => $post->getTitle(),
            ':text' => $post->getText(),
        ]);
    }

    public function get(User $author): Post
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE author = :author'
        );
        $statement->execute([
            ':author' => $author->uuid()
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new PostNotFound(
                "Блог у /" . $author->getUsername() . "/ не найден"
            );
        }
        return new Post(
            new UUID($result['uuid']),
            $author,
            $result['title'],
            $result['text'],
        );
    }
}