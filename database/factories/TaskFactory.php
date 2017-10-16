<?php

use Faker\Generator as Faker;


$factory->define(App\Task::class, function (Faker $faker) {
    $status = mt_rand(0, 2);

    $finished_at = $status == 2 ? $faker->dateTime() : NULL;

    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'creator_user_id' => App\User::inRandomOrder()->first()->id,
        'parent_task_id' => NULL,
        'status' => $status,
        'finished_at' => $finished_at,
        'priority' => mt_rand(0, 255),
    ];

});
