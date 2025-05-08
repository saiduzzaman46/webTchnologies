<?php
require_once '../config/connection.php';

function get_email(object $conn, string $email)
{
    $query = "SELECT * FROM `register` WHERE `email` = '$email';";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function insert_user(object $conn, string $fname, string $email, string $password, int $dob, string $country, string $gender, string $color, string $opinion)
{

    $query = "INSERT INTO `register` (`fname`, `email`, `password`, `birth_year`, `country`, `gender`, `color`, `opinion`) 
                VALUES ('$fname', '$email', '$password', '$dob', '$country', '$gender', '$color', '$opinion');";
    $conn->query($query);
}



