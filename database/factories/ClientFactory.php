<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_name'   => $this->$faker->firstName,
        'email'         => $this->$faker->email,
        'contact_number'=> $this->$faker->e164PhoneNumber,
        'referenced_by' => $this->$faker->firstName,
    ];
});
