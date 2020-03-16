<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'title'=> $faker->word,
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 1),
        'user_id'=>'1'
    ];
});
