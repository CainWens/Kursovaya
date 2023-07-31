<?php
namespace Geekbrains\Cainwens\Repositories\CommentRepository;

use Geekbrains\Cainwens\Comment;
use Geekbrains\Cainwens\Exeptions\CommentNotFound;
use Geekbrains\Cainwens\Exeptions\UserNotFound;
use Geekbrains\Cainwens\Post;
use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\UUID;
use \PDO;

class CommentRepository
{
    public function __construct(private PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Comment $comment): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO comments 
            (uuid, post_uuid, author_uuid, text) 
            VALUES 
            (:uuid, :post_uuid, :author_uuid, :text)'
        );
        $statement->execute([
            ':uuid' => $comment->getUuid(),
            ':post_uuid' => $comment->getPost(),
            ':author_uuid' => $comment->getAuthor(),
            ':text' => $comment->getText(),
        ]);
    }

    public function get(Post $post): array
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM comments WHERE post_uuid = :uuid'
        );
        $statement->execute([
            ':uuid' => $post->uuid()
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new CommentNotFound(
                "Комментарии к " . $post->getTitle() . " не найден"
            );
        }

        foreach ($result as $comEvent) {
            $uUser = $comEvent['author_uuid'];
            $saveUser = $this->connection->prepare(
                'SELECT * FROM users WHERE uuid = :uuid'
            );
            $saveUser->execute([
                ':uuid' => $uUser
            ]);
            $user = $saveUser->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {
                throw new UserNotFound(
                    "Пользователь /$uUser/ не найден"
                );
            }
            $auth = new User(
                new UUID($user['uuid']),
                $user['username'],
                $user['first_name'],
                $user['last_name']
            );

            $comment[] = new Comment(
                new UUID($comEvent['uuid']),
                $post,
                $auth,
                $comEvent['text']
            );
        }
        return $comment;
    }
}