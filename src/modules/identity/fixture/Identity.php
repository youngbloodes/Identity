<?php
require 'C:\ospanel\domains\Identity-main\config\db.php';
require 'C:\ospanel\domains\Identity-main\vendor\autoload.php';

$database = new Database();
$conn = $database->getConnection();

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
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Данные успешно добавлены в таблицу Identity";
    }catch(PDOException $exception)
    {
        echo "Ошибка добавления данных в таблицу Identity";
    }
}
$conn = null;
