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
    $query = "SELECT fname,password FROM `user` WHERE email = '$email';";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if ($row['password'] == $password) {
        $_SESSION['user'] = [
            'fname' => $row['fname'],
            'email' => $email,
        ];
        return true;
    } else {
        return false;
    }
}

function get_user_data(object $conn, string $email)
{
    $query = "SELECT * FROM `user` WHERE email = '$email';";
    $result = $conn->query($query);
    return $result->fetch_assoc();
}

function get_user_color($conn,$email): string
{
    // if (isset($_COOKIE['favorite_color'])) {
    //     list($color, $email) = explode('|', $_COOKIE['favorite_color']);
    // }
    $query = "SELECT color FROM `user` WHERE email = '$email';";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['color'];

}

