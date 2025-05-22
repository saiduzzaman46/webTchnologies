<?php
function get_aqi_data(object $conn)
{
    try {
        $query = "SELECT * FROM `info`";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['country']) . "</td>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
            echo "<td><input type='checkbox' name='selected_ids[]' value='$id' class='checkbox'></td>";
            echo "</tr>";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

