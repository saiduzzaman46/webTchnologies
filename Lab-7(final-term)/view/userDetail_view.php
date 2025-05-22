<?php
session_start();
require_once '../config/connection.php';
require_once '../model/login_model.php';

if (!isset($_SESSION['user']['email'])) {
  header("Location: ../index.php?register=error");
  exit();
}
if (isset($_SESSION['user']['email'])) {
  $userData = get_user_data($conn, $_SESSION['user']['email']);
} else {
  $userData = null;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/process.css" />
  <title>Document</title>
</head>

<body>
  <h1>Here is your input information</h1>

  <div class="container">
    <div class="inner-container">
      <p>Full Name: <?php echo htmlspecialchars($userData['fname']); ?></p>
      <p>Email: <?php echo htmlspecialchars($userData['email']); ?></p>
      <p>Birth Year: <?php echo htmlspecialchars($userData['birth_year']); ?></p>
      <p>Country: <?php echo htmlspecialchars($userData['country']); ?></p>
      <p>Gender: <?php echo htmlspecialchars($userData['gender']); ?></p>
      <p>Favorite Color: <?php echo htmlspecialchars($userData['color']); ?></p>
      <p>Opinion: <?php echo htmlspecialchars($userData['opinion']); ?></p>

      <div class="button-container">
        <button class="confirm" onclick="window.location.href='showaqi.php';">OK</button>
      </div>

    </div>
  </div>

</body>
<!-- onclick="window.location.href='../index.php';" -->

</html>