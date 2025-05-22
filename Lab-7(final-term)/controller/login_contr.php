<?php

function is_empty_email($email)
{
    return empty($email) ? true : false;
}
function is_empty_password($password)
{
    return empty($password) ? true : false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once '../config/connection.php';
        require_once '../model/login_model.php';

        $error = [];
        if (is_empty_email($email)) {
            $error['email'] = "Email is required";
        } elseif (is_empty_password($password)) {
            $error['password'] = "Password is required";
        } elseif (!get_email($conn, $email)) {
            $error['email'] = "Email does not exist";
        }

        if ($error) {
            $_SESSION['errorLogin'] = $error;
            header("Location: ../index.php");
            exit();
        } else {
            if (get_password($conn, $email, $password)) {
                $_SESSION['login_success'] = true;
                $color = get_user_color($conn,$email);
                setcookie('favorite_color', $color, time() + (86400 * 30), "/");
                header("Location: ../view/request.php");
                die();
            } else {
                $error["wrong_password"] = "Wrong password";
                $_SESSION["errorLogin"] = $error;
                header("Location: ../index.php");
                die();
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die();
}
