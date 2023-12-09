<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $language_id = $faker->numberBetween(1, 10);
    $value = $faker->lastName;
    $gender = $faker->randomElement([0, 1]);
    $genderLabel = $gender == 0 ? 'Жен' : 'Муж';
    $sql = "INSERT INTO Surname (language_id, value, gender) VALUES ('$language_id', '$value', '$genderLabel')";
    $sqlrequire = mysqli_query($db, $sql);
    if(!$sqlrequire){
        echo "Ошибка добавления данных в таблицу Surname". mysqli_error($db);
    }
}