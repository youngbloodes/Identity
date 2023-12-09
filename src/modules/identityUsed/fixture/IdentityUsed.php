<?php
require 'C:\ospanel\domains\Identity-main\config\database.php';
require 'C:\ospanel\domains\Identity-main\vendor\autoload.php';

$database = new Database();
$conn = $database->getConnection();

$faker = Faker\Factory::create('ru_RU');
for ($i = 0; $i < 2; $i++){
    $user_id = $faker->randomNumber();
    $identity_id = $faker->randomNumber();
    $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $sql = "INSERT INTO IdentityUsed (user_id, identity_id, created_at) VALUES ('$user_id', '$identity_id', '$created_at')";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Данные успешно добавлены в таблицу IdentityUsed";
    }catch(PDOException $exception)
    {
        echo "Ошибка добавления данных в таблицу IdentityUserd";
    }
}
$conn = null;