<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $email = $faker->email;
    $password = $faker->password;
    $tariff_id = $faker->numberBetween(1, 100);
    $tariff_date_end = $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d');
    $token = $faker->uuid;
    $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');
    $deleted_at = $faker->randomElement([$faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'), null]);
    $sql = "INSERT INTO User (email, password, tariff_id, tariff_date_end, token, created_at, updated_at, deleted_at) VALUES ('$email', '$password', '$tariff_id', '$tariff_date_end', '$token', '$created_at', '$updated_at', '$deleted_at')";
    $sqlrequire = mysqli_query($db, $sql);
    if(!$sqlrequire){
        echo "Ошибка добавления данных в таблицу User";
    }
}
