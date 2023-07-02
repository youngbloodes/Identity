<?php
$db = mysqli_connect('127.0.0.1:3306','root','','Carti');
if(!$db){
    echo ("Не удалось подключиться к базе данных");
}