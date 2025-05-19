<?php

function check_error_email()
{

    if (isset($_SESSION['errorLogin']['email'])) {
        echo '<p class="error lerrorEmail">' . $_SESSION['errorLogin']['email'] . '</p>';
        unset($_SESSION['errorLogin']['email']);
    } else {
        echo '<p class="error errorEmail"></p>';
    }
}

function check_error_password()
{
    if (isset($_SESSION['errorLogin']['password'])) {
        echo '<p class="error lerrorPass">' . $_SESSION['errorLogin']['password'] . '</p>';
        unset($_SESSION['errorLogin']['password']);
    } elseif (isset($_SESSION['errorLogin']['wrong_password'])) {
        echo '<p class="error lerrorPass">' . $_SESSION['errorLogin']['wrong_password'] . '</p>';
        unset($_SESSION['errorLogin']['wrong_password']);
    } else {
        echo '<p class="error lerrorPass"></p>';
    }
}
