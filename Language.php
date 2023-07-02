<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $value = $faker->languageCode;
    $sql = "INSERT INTO Language (value) VALUES ('$value')";
    $sqlrequire = mysqli_query($db, $sql);
    if(!$sqlrequire){
    }
    echo "Ошибка добавления данных в таблицу language";
}
