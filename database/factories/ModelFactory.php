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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123'),
        'remember_token' => str_random(10),

    ];
});


$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'contact_person' => $faker->name,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber,
        'website' => $faker->url,
        'notes' => $faker->sentence(),
    ];
});


$factory->define(App\Device::class, function (Faker\Generator $faker) {

    return [
        'manufacturer' => $faker->randomElement(array('Kavo', 'Planmeca', 'NSK')),
        'type' => $faker->randomElement(array('turbina', 'mikromotor', 'polimerizacijska lampa')),
        'serial_number' => str_random(10),
        'model' => $faker->randomElement(array('ZX100', 'FK50', 'LS500')),
        'notes' => $faker->sentence(),
    ];
});


$factory->define(App\Job::class, function (Faker\Generator $faker) {

    return [
        'device_id' => \App\Device::first()->id,
        'user_id' => \App\User::first()->id,
        'notes' => $faker->sentence(),
    ];
});
