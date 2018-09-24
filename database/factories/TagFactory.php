<?php

use Faker\Generator as Faker;

$factory->define(Pomot\Domains\Log\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
