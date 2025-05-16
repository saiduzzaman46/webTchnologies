<?php

function check_error_register()
{
    if (isset($_SESSION['errorRegister']['email'])) {
        echo '<p class="error">' . $_SESSION['errorRegister']['email'] . '</p>';
        unset($_SESSION['errorRegister']['email']);
    } else {
        echo '<p class="error errorEmail"></p>';
    }
}
