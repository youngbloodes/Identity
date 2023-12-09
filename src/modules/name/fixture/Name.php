<?php
require 'C:\ospanel\domains\Identity-main\config\database.php';
require 'C:\ospanel\domains\Identity-main\vendor\autoload.php';

$database = new Database();
$conn = $database->getConnection();

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $language_id = $faker->numberBetween(1, 10);
    $value = $faker->firstName;
    $gender = $faker->randomElement([0, 1]);
    $genderLabel = $gender == 0 ? 'Жен' : 'Муж';
    $sql = "INSERT INTO Name (language_id, value, gender) VALUES ('$language_id', '$value', '$genderLabel')";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Данные успешно добавлены в таблицу Name";
    }catch(PDOException $exception)
    {
        echo "Ошибка добавления данных в таблицу Name";
    }
}
$conn = null;