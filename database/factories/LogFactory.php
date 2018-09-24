<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(\Pomot\Domains\Log\Log::class, function (Faker $faker) {
    return [
        'user_id' => function($model) {
            return factory(\Pomot\User::class)->create()->id;
        },
        'title' => $faker->unique()->sentence(),
        'description' => $faker->text(), // secret
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->state(\Pomot\Domains\Log\Log::class, 'have_tags', function(Faker $faker, $attributes){
    return [

    ];
});

$factory->afterCreatingState(\Pomot\Domains\Log\Log::class, 'have_tags', function($model, Faker $faker){
    for($i=0; $i<3; $i++) {
        $model->tags()->save(factory(\Pomot\Domains\Log\Tag::class)->make());
    }
});
