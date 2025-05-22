<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_ids'])) {
    $_SESSION['selected_ids'] = $_POST['selected_ids'];
    header("Location: ../view/showaqi.php");
    exit();
}

function show_selected_data(mysqli $conn) {
  
    $ids = array_map('intval', $_SESSION['selected_ids']);
    $ids_list = implode(',', $ids);

    $query = "SELECT * FROM `info` WHERE id IN ($ids_list)";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
            echo "<td>" . htmlspecialchars($row['aqi']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found for selected IDs.</td></tr>";
    }
}