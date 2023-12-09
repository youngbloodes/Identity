<?php
require 'C:\ospanel\domains\Identity-main\config\database.php';
require 'C:\ospanel\domains\Identity-main\vendor\autoload.php';

$database = new Database();
$conn = $database->getConnection();

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 10; $i++){
    $value = $faker->languageCode;
    $sql = "INSERT INTO Language (value) VALUES ('$value')";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Данные успешно добавлены в таблицу Language";
    }catch(PDOException $exception)
    {
        echo "Ошибка добавления данных в таблицу Language";
    }
}
$conn = null;