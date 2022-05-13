<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $arrayValues = ['pending', 'under_working', 'completed'];
    return [
        'client_id'          => \App\Models\Client::factory()->create()->id,
        'project_name'       => $this->$faker->word,
        'started_date'       => $this->$faker->date($format = 'Y-m-d', $max = 'now'), 
        'delivery_date'      => $this->$faker->date($format = 'Y-m-d', $max = 'now'),
        'budget'             => $this->$faker->numberBetween($min = 1000, $max = 90000),
        'no_of_developers'   => $this->$faker->numberBetween($min = 1, $max = 5),
        'plan_report_url'    => $this->$faker->imageUrl($width = 640, $height = 480),
        'status'             => $arrayValues[rand(0,2)]
    ];
});
