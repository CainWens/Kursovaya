<?php

use Geekbrains\Cainwens\Comment;
use Geekbrains\Cainwens\Exeptions\ArgvNotFound;
use Geekbrains\Cainwens\Post;
use Geekbrains\Cainwens\Repositories\CommentRepository\CommentRepository;
use Geekbrains\Cainwens\Repositories\UserRepository\SqliteUserRepository;
use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\UUID;
use Geekbrains\Cainwens\Repositories\PostRepository\PostsRepositoryInterface;

include __DIR__ . "/vendor/autoload.php";

$faker = Faker\Factory::create('ru_RU');
$gender = 'male';

//объект подключения SQLite
$connection = new PDO("sqlite:blog.db");

//создаем объект репозитория
$usersRepository = new SqliteUserRepository($connection);

//Добавляем в репозиторий несколько пользователей
// $usersRepository->save(new User(UUID::random(), $faker->email(), $faker->firstName($gender), $faker->lastName($gender)));
$user1 = $usersRepository->get('Apach24');
$user2 = $usersRepository->get('Lod');
$user3 = $usersRepository->get('Afw234');
$user4 = $usersRepository->get('pakomova.matvei@petrov.com');
$user5 = $usersRepository->get('emma.fokina@markova.ru');
$user6 = $usersRepository->get('wkulagina@bk.ru');

$postRepository = new PostsRepositoryInterface($connection);

// $postRepository->save(new Post(UUID::random(), $user, "Заголовок первый", "Пишу тут сообщение и всё такое"));
// $postRepository->save(new Post(UUID::random(), $user2, "ПХП", "Хочу научиться кодить на php"));
$post = $postRepository->get($user1);
$post2 = $postRepository->get($user2);
// echo $post;
// var_dump($post);

$commentRepository = new CommentRepository($connection);
// $commentRepository->save(new Comment(UUID::random(), $post, $user3, 'Я тоже погляжу'));
// $commentRepository->save(new Comment(UUID::random(), $post, $user4, 'А что не так?'));
// $commentRepository->save(new Comment(UUID::random(), $post, $user5, 'Rnj [jxtn dsexbnm G{G'));
// $commentRepository->save(new Comment(UUID::random(), $post, $user6, 'Как я сюда попал?'));
$com = $commentRepository->get($post);
echo $post;
foreach ($com as $comEvent) {
    echo $comEvent;
}
;