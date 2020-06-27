<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gyvunas;
use Faker\Generator as Faker;

$factory->define(Gyvunas::class, function (Faker $faker) {
    return array(
        //
        'animal' => $faker->text(15),
        'user_id' =>  $d = factory(\App\User::class),
        'breed' => $faker->text(15),
        'sex' => $faker->boolean(50),
        'age' => $faker->biasedNumberBetween(0,22),
        'color' => $faker->colorName,
        'info' => $faker->paragraph,
        'olduser' => function (array $post) {
            return $post['user_id'];
        }
    );
});
