<?php

use Geekbrains\Cainwens\Comment;
use Geekbrains\Cainwens\Exeptions\ArgvNotFound;
use Geekbrains\Cainwens\Post;
use Geekbrains\Cainwens\Repositories\SaveArgv;
use Geekbrains\Cainwens\User;

include __DIR__ . "/vendor/autoload.php";

// try {
//     $av = new SaveArgv();
//     $av->get($argv[1]);
// } catch (ArgvNotFound $e) {
//     echo $e->getMessage();
// } catch (Exception $e) {
//     echo "Что-то совсем не так" . PHP_EOL;
//     echo $e->getMessage();
// }



$faker = Faker\Factory::create('ru_RU');
$gender = 'male';

$user = new User(1, $faker->firstName($gender), $faker->lastName($gender));
$post = new Post(1, $user->getId(), $user, $faker->realText($maxNbChars = 20), $faker->realText($maxNbChars = 200));
$user2 = new User(2, $faker->firstName($gender), $faker->lastName($gender));
$comment = new Comment(1, $user2->getId(), $post->getId(), $user2, $faker->realText($maxNbChars = 50));


try {
    if (!$argv[1]) {
        echo "Нет параметра";
    } else {
        switch ($argv[1]) {
            case "user":
                echo $user;
                break;
            case "post":
                echo $post;
                break;
            case "comment":
                echo $comment;
                break;
        }
    }
} catch (ArgvNotFound $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo "Что-то совсем не так";
    echo $e->getMessage();
}