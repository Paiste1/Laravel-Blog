<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->realText(rand(10,40)); // создаем рандомный титл
    $short_title = mb_strlen($title)>30 ? mb_substr($title, 0 ,30) . '...' : $title; // если больше 30 символов то обрезаем, если нет то оставляем
    $created = $faker->dateTimeBetween('-30days', '-1days'); // рандомная дата создания от -30 дней до -1


    return [
        'title' => $title,
        'short_title' => $short_title,
        'author_id' => rand(1,4),
        'descr' => $faker->realText(rand(100,500)),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
