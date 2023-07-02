<?php
require 'lib/connect.php';
require 'C:\OSPanel\vendor\autoload.php';

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $name_id = $faker->randomNumber();
    $surname_id = $faker->randomNumber();
    $language_id = $faker->randomNumber();
    $age = $faker->numberBetween(18, 65);
    $gender = $faker->randomElement([0, 1]);
    $genderLabel = $gender == 0 ? 'Жен' : 'Муж';
    $email = $faker->email;
    $sql = "INSERT INTO Identity (name_id, surname_id, language_id, age, gender, email) VALUES ('$name_id','$surname_id','$language_id','$age','$genderLabel','$email')";
    $sqlquery = mysqli_query($db, $sql);
    if(!$sqlquery){
        echo "Ошибка заполнения данных таблицы Identity";
    }
}
