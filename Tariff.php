<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $name = $faker->name;
    $count_requests_day = $faker->numberBetween(1, 100); 
    $price = $faker->randomFloat(2, 10, 100);
    $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');
    $deleted_at = $faker->randomElement([$faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'), null]);
    $sql = "INSERT INTO Tariff (name, count_requests_day, price, created_at, updated_at, deleted_at) VALUES ('$name', '$count_requests_day', '$price', '$created_at', '$updated_at', '$deleted_at')";
    $sqlrequire = mysqli_query($db, $sql);
    if(!$sqlrequire){
        echo "Ошибка добавления данных в таблицу User";
    }
}
