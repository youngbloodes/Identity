<?php


class User
{
    private $conn;
    private $table_name = "User";

    public int $id;
    public string $email;
    public string $password;
    public int $tariff_id;
    public \DateTime $tariff_date_end;
    public string $token;
    public \DateTime $created_at;
    public \DateTime $updated_at;
    public \DateTime $deleted_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public static function CreateUser(User $user)
    {
        $faker = Faker\Factory::create('ru_RU');
    
        $query = "INSERT INTO " . $user->table_name . " (
            email, 
            password, 
            tariff_id, 
            tariff_date_end, 
            token, 
            created_at, 
            updated_at, 
            deleted_at
        ) 
        VALUES (:email, :password, :tariff_id, :tariff_date_end, :token, :created_at, :updated_at, :deleted_at)";
    
        $stmt = $user->conn->prepare($query);
    
        //Faker
        $email = $faker->email;
        $password = $faker->password; 
        $tariff_id = $faker->numberBetween(1, 100);
        $tariff_date_end = $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d');
        $token = $faker->uuid;
        $created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
        $updated_at = $faker->dateTimeBetween($created_at, 'now')->format('Y-m-d H:i:s');
        $deleted_at = $faker->randomElement([$faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s')]);
    
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":tariff_id", $tariff_id);
        $stmt->bindParam(":tariff_date_end", $tariff_date_end);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":created_at", $created_at);
        $stmt->bindParam(":updated_at", $updated_at);
        $stmt->bindParam(":deleted_at", $deleted_at);
    
        if (!$stmt->execute()) {
            return false;
        } else {
            return true;
        }
    }
    


    public static function UpdateUser()
    {
    }
}
