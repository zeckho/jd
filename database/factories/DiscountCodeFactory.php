<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DiscountCode;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(DiscountCode::class, function (Faker $faker) {
    return [
        'discount_code' => Str::random(5),//$faker->unique()->lexify('?????'),
        'discount_percentage' => $faker->unique()->numberBetween($min = 10, $max = 99)
    ];
});
