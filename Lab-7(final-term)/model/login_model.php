<?php
function get_email(object $conn, string $email)
{
    $query = "SELECT email FROM `user` WHERE email = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function get_password(object $conn, string $email, string $password)
{
    $query = "SELECT password FROM `user` WHERE email = '$email';";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        return true;
    } else {
        return false;
    }
}
