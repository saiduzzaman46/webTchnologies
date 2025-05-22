<?php
session_start();


function create_user(object $conn, string $fname, string $email, string $password, int $dob, string $country, string $gender, string $color, string $opinion)
{
  insert_user($conn, $fname, $email, $password, $dob, $country, $gender, $color, $opinion);
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  try {
    require_once '../config/connection.php';
    require_once '../model/register_model.php';


    if (isset($_POST['confirm'])) {

      $fname = $_SESSION['registration_data']['fname'];
      $email = $_SESSION['registration_data']['email'];
      $password = $_SESSION['registration_data']['password'];
      $dob = $_SESSION['registration_data']['dob'];
      $country = $_SESSION['registration_data']['country'];
      $gender = $_SESSION['registration_data']['gender'];
      $color = $_SESSION['registration_data']['color'];
      $opinion = $_SESSION['registration_data']['opinion'];

      create_user($conn, $fname, $email, $password, $dob, $country, $gender, $color, $opinion);

      // setcookie('favorite_color', $color . '|' . $email, time() + (86400 * 30), "/");
      unset($_SESSION['registration_data']);

      header("Location: ../index.php?register=success");
      die();
    }
    if (isset($_POST['cancel'])) {
      unset($_SESSION['registration_data']);
      header("Location: ../index.php?register=cancelled");
      die();
    }
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
} else {
  header("Location: ../index.php");
  die();
}
