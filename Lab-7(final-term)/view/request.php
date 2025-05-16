<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selected AQI</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin-top: 30px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    table {
      width: 50%;
      border-collapse: collapse;
      margin-bottom: 20px;
      max-width: 600px;
      margin: 10px auto;
    }

    th,
    td {
      padding: 10px 5px;
      text-align: center;
    }

    th {
      background-color: #333;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #ddd;
    }

    input[type="checkbox"] {
      cursor: pointer;
      width: 15px;
      height: 15px;
    }

    .footertr {
      border: none;

    }

    .footertr:hover {
      background-color: #f9f9f9;
      padding: 0px;
      margin: 0px;
    }

    .footertr>td {
      text-align: center;
    }

    .error {
      color: red;
      margin: 0px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 40px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h2>Select At Least 10 Cities</h2>


  <form onsubmit="return validatSelection()" action="showaqi.php" method="POST">
    <table border="1">
      <thead>
        <tr>
          <th>Country</th>
          <th>City</th>
          <!-- <th>AQI</th> -->
          <th>Select</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once '../config/connection.php';
        require_once '../model/register_model.php';
        get_aqi_data($conn);
        ?>
      </tbody>
      <tfoot>
        <tr class="footertr">
          <td colspan="4">
            <p class="error"></p>
            <input type="submit" value="Submit" />
          </td>
        </tr>
      </tfoot>
    </table>
  </form>

  <script>
    function validatSelection() {
      const checkedBoxes = document.querySelectorAll('.checkbox:checked');
      const errorMessage = document.querySelector('.error');

      if (checkedBoxes.length < 10) {
        errorMessage.textContent = "Please select at least 10 rows.";
        return false;
      }

      errorMessage.textContent = "";
      return true;
    }
  </script>

</body>

</html>