
<?php
session_start();
function create_user(object $conn, string $fname, string $email, string $password, int $dob, string $country, string $gender, string $color, string $opinion)
{
    insert_user($conn, $fname, $email, $password, $dob, $country, $gender, $color, $opinion);
}

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
        'dob' => $dob,
        'country' => $country,
        'gender' => $gender,
        'color' => $color,
        'opinion' => $opinion
    ];
    try {
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

        create_user($conn, $fname, $email, $password, $dob, $country, $gender, $color, $opinion);

        
        unset($_SESSION['errorRegister']);


        header("Location: ../view/process.php?register=success");
        die();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
