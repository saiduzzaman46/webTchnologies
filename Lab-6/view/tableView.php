<?php
function viewTable()
{
    echo '<thead><tr><th>City</th><th>AQI</th></tr></thead>';
    echo '<tbody>';
    for ($i = 0; $i < 10; $i++) {
        echo '<tr>';
        echo '<td>' . "BANGLADESH" . '</td>';
        echo '<td>' . 57 . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '<div class="loginFirst">LOGIN FIRST</div>';
}
