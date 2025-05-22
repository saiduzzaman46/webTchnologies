<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['back'])) {
        header("Location: ../view/request.php");
        die();
    }
    if (isset($_POST['logout'])) {
        session_start();
        unset($_SESSION['login_success']);
        unset($_SESSION['username']);
        unset($_SESSION['user']);
        unset($_SESSION['selected_ids']);
        header("Location: ../index.php");
        die();
    }
} else {
    header("Location: ../index.php");
    die();
}
