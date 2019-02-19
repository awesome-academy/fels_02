<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    return [
        'topic_name' => $faker->word,
        'preview' => 'preview',
        'picture' => 'topic.jpg',
        'parent_id' => '0',
    ];
});
