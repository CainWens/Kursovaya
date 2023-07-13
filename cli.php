<?php

use Geekbrains\Cainwens\Comment;
use Geekbrains\Cainwens\User;
use Geekbrains\Cainwens\Post;

include __DIR__ . "/vendor/autoload.php";

$faker = Faker\Factory::create('ru_RU');
$gender = 'male';

$user = new User(1, $faker->firstName($gender), $faker->lastName());
echo $user;

$post = new Post(1, $user->getId(), $user, $faker->realText($maxNbChars = 20), $faker->realText($maxNbChars = 200));
echo $post;

$user2 = new User(2, $faker->firstName($gender), $faker->lastName());
$comment = new Comment(1, $user2->id, $post->id, $user2, $faker->realText($maxNbChars = 50));
echo $comment;