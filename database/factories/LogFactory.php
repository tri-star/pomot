<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Pomot\Domains\Log\Log::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(),
        'description' => $faker->text(), // secret
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
