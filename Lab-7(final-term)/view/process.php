<?php
session_start();

if (!isset($_SESSION['registration_data'])) {
  header("Location: ../index.php?register=error");
  exit();
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
      <p>Full Name: <?php echo htmlspecialchars($_SESSION['registration_data']['fname'] ?? ''); ?></p>
      <p>Email: <?php echo htmlspecialchars($_SESSION['registration_data']['email'] ?? ''); ?></p>
      <p>Birth Year: <?php echo htmlspecialchars($_SESSION['registration_data']['dob'] ?? ''); ?></p>
      <p>Country: <?php echo htmlspecialchars($_SESSION['registration_data']['country'] ?? ''); ?></p>
      <p>Gender: <?php echo htmlspecialchars($_SESSION['registration_data']['gender'] ?? ''); ?></p>
      <p>Favorite Color: <?php echo htmlspecialchars($_SESSION['registration_data']['color'] ?? ''); ?></p>
      <p>Opinion: <?php echo htmlspecialchars($_SESSION['registration_data']['opinion'] ?? ''); ?></p>
      <form method="post" action="../controller/process_contr.php">
        <div class="button-container">
        <button class="confirm" type="submit" name="confirm">Confirm</button>
        <input class="cancel" type="submit" name="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </div>
</body>
<!-- onclick="window.location.href='../index.php';" -->
</html>


