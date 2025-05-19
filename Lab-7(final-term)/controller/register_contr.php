
<?php
session_start();


function is_email_exists(object $conn, string $email)
{
    if (get_email($conn, $email)) {
        return true;
    } else {
        return false;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];
    $opinion = $_POST['opinion'];

    $_SESSION['registration_data'] = [
        'fname' => $fname,
        'email' => $email,
        'password' => $password,
        'dob' => $dob,
        'country' => $country,
        'gender' => $gender,
        'color' => $color,
        'opinion' => $opinion
    ];
    try {
        require_once '../config/connection.php';
        require_once '../model/register_model.php';

        $error = [];

        if (is_email_exists($conn, $email)) {
            $error['email'] = "Email already exists";
        }


        if ($error) {
            $_SESSION['errorRegister'] = $error;
            header("Location: ../index.php?register=error");
            die();
        }



        unset($_SESSION['errorRegister']);


        header("Location: ../view/process.php");
        die();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}else {
    header("Location: ../index.php");
    die();
}
