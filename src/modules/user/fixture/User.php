<?php

require 'C:\ospanel\domains\Identity-main\config\database.php';
require 'C:\ospanel\domains\Identity-main\vendor\autoload.php';
require 'C:\ospanel\domains\Identity-main\src\modules\user\ClassUser.php';

$database = new Database();

$conn = $database->getConnection();

if ($conn) {
    $user = new User($conn);
    $faker = Faker\Factory::create('ru_RU');
    User::CreateUser(
        $user,
        $faker->email,
        $faker->password,
        $faker->numberBetween(1, 100),
        $faker->dateTimeBetween('now', '+1 year'),
        $faker->uuid,
        $faker->dateTimeBetween('-1 year', 'now'),
        $faker->dateTimeBetween('-1 year', 'now'),
        $faker->randomElement([$faker->dateTimeBetween('-1 year', 'now'), null])
    );

    $conn = null;
} else {
    echo "Ошибка подключения к БД.";
}
