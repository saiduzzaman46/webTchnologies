<?php
session_start();
require_once 'view/tableView.php';
require_once 'view/register_view.php';
require_once 'view/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
  <header>
    <div class="logo"></div>
  </header>
  <main>
    <h1>Title</h1>
    <div class="continer">
      <div class="column">
        <div class="register">
          <form class="register-form" onsubmit="return validate()" action="controller/register_contr.php" method="POST">
            <h2>Register</h2>
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <div class="input-group">
                <input type="text" id="fullname" name="fname" />
                <p class="error errorName"></p>
              </div>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <div class="input-group">
                <input type="email" id="email" name="email" />
                <?php check_error_register() ?>
              </div>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <div class="input-group">
                <input type="password" id="password" name="password" />

                <p class="error errorPass"></p>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm-password">Confirm Password:</label>
              <div class="input-group">
                <input
                  type="password"
                  id="confirm-password"
                  name="confirm-password" />
                <p class="error errorConPass"></p>
              </div>
            </div>

            <div class="form-group" class="dob-group">
              <label for="dob">Birth Year:</label>

              <div class="input-group">
                <select id="dob" name="dob">
                  <option value="">Select Year</option>
                </select>
                <p class="error errorDOB"></p>
              </div>
            </div>
            <p></p>

            <div class="form-group">
              <label for="country">Country:</label>
              <div class="input-group">
                <select id="country" name="country">
                  <option value="">Select</option>
                </select>
                <p class="error errorCountry"></p>
              </div>
            </div>

            <div class="form-group">
              <label>Gender:</label>

              <div class="input-group">
                <div class="gender-group">
                  <input type="radio" id="male" name="gender" value="male" />
                  <label for="male">Male</label>
                  <input
                    type="radio"
                    id="female"
                    name="gender"
                    value="female" />
                  <label for="female">Female</label>
                </div>
                <p class="error errorGender"></p>
              </div>
            </div>

            <div class="form-group">
              <label for="color">Favorite Color:</label>

              <div class="input-group">
                <input type="color" id="color" name="color" />
                <p class="error errorName"></p>
              </div>
            </div>

            <div class="form-group">
              <label for="opinion">Your Opinion:</label>
              <textarea
                id="opinion"
                name="opinion"
                rows="4"
                cols="20"></textarea>
            </div>

            <div class="terms-group">
              <div>
                <input type="checkbox" id="terms" name="terms" />
                <label for="terms" class="terms-label">
                  I agree to the
                  <a href="/terms" target="_blank">terms and conditions</a>
                </label>
              </div>
              <div>
                <p class="error errorTerms"></p>
              </div>
            </div>
            <input class="submit" type="submit" value="Register" name="register" />
          </form>
        </div>
      </div>
      <div class="column">
        <div class="login" id="green">
          <form class="login-form" action="controller/login_contr.php" method="POST">
            <h2>Login</h2>

            <div class="form-group">
              <label for="email">Email:</label>
              <div class="input-group">
                <input type="email" id="lEmail" name="email" />
                <?php check_error_email() ?>
              </div>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <div class="input-group">
                <input type="password" id="lPassword" name="password" />
                <?php check_error_password() ?>
              </div>
            </div>

            <input class="submit" type="submit" value="Login" />
          </form>
        </div>
        <div class="data-table">
          <table>
            <?php
            viewTable();
            ?>

          </table>

        </div>
      </div>
    </div>
  </main>
  <script src="assets/data.js"></script>
  <script src="assets/script.js"></script>
</body>

</html>