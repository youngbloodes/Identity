<?php

class Tariff
{
    private $id;
    private $name;
    private $count_requests_day;
    private $price;
    private $created_at;
    private $updated_at;
    private $deleted_at;

    public function __construct(int $id, string $name, int $count_requests_day, string $price, \DateTime $created_at, \DateTime $updated_at, ?\DateTime $deleted_at = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->count_requests_day = $count_requests_day;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }
}