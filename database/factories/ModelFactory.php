<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'role_id' => 2,
        'joining_date' =>  $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')->format('d/m/Y'),
        'per_month_pay' => $faker->numberBetween($min = 500, $max = 2000),
        'per_week_pay' => $faker->numberBetween($min = 100, $max = 500),
        'expected_day_of_invoice' => $faker->numberBetween($min = 1, $max = 28),
        'paypal_email' => $faker->unique()->safeEmail
    ];
});