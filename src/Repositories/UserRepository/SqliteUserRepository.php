<?php
namespace Geekbrains\Cainwens\Repositories\UserRepository;

use Geekbrains\Cainwens\Exeptions\UserNotFound;
use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\UUID;
use \PDO;

class SqliteUserRepository
{
    public function __construct(private PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): void
    {
        // Подготавливаем запрос
        $statement = $this->connection->prepare(
            'INSERT INTO users (uuid, username, first_name, last_name) VALUES (:uuid, :username, :first_name, :last_name)'
        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':uuid' => $user->uuid(),
            ':username' => $user->getUsername(),
            ':first_name' => $user->getFirstname(),
            ':last_name' => $user->getLastname(),
        ]);
    }

    public function get($username): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE username = :username'
        );
        $statement->execute([
            ':username' => $username
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new UserNotFound(
                "Пользователь /$username/ не найден"
            );
        }
        return new User(
            new UUID($result['uuid']),
            $result['username'],
            $result['first_name'],
            $result['last_name']
        );
    }

}