<?php
require_once '../config/connection.php';

function get_email(object $conn, string $email)
{
    $query = "SELECT * FROM `register` WHERE `email` = '$email';";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function insert_user(object $conn, string $fname, string $email, string $password, int $dob, string $country, string $gender, string $color, string $opinion)
{

    $query = "INSERT INTO `register` (`fname`, `email`, `password`, `birth_year`, `country`, `gender`, `color`, `opinion`) 
                VALUES ('$fname', '$email', '$password', '$dob', '$country', '$gender', '$color', '$opinion');";
    $conn->query($query);
}

function get_aqi_data(object $conn)
{
    try {
        $query = "SELECT * FROM `info`";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            $value = $row['city'] . "," . $row['aqi'];
            echo "<tr>";
            echo "<td>" . $row['country'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            // echo "<td>" . $row['aqi'] . "</td>";
            echo "<td><input type='checkbox'  name='selected[]' value='$value'  class = 'checkbox'/></td>";
            echo "</tr>";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function selected_cities()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected'])) {
        $_SESSION['selected_rows'] = $_POST['selected'];
    }
    if (isset($_SESSION['selected_rows'])) {
        foreach ($_SESSION['selected_rows'] as $row) {
            $data = explode(",", $row);
            echo "<tr>";
            echo "<td>" . $data[0] . "</td>";
            echo "<td>" . $data[1] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data available</td></tr>";
    }
}
