<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $user_id = $faker->randomNumber();
    $identity_id = $faker->randomNumber();
    $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $sql = "INSERT INTO IdentityUsed (user_id, identity_id, created_at) VALUES ('$user_id', '$identity_id', '$created_at')";
    $sqlrequire = mysqli_query($db, $sql);
    if(!$sqlrequire){
        echo "Ошибка добавления данных в таблицу IdentityUsed: ";
    }
}