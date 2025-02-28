<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

echo "Nome: " . $faker->name() . PHP_EOL;
echo "E-mail: " . $faker->email() . PHP_EOL;
echo "Cidade: " . $faker->city() . PHP_EOL;
?>
