<?php
$bgColor = isset($_COOKIE['favorite_color']) ? htmlspecialchars($_COOKIE['favorite_color']) : '#f4f4f4';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Show AQI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo $bgColor; ?>;
            margin-top: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 30%;
            border-collapse: collapse;
            margin-bottom: 20px;
            /* max-width: 600px; */
            margin: 10px auto;
            background-color: #f9f9f9;
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

        .footertr {
            border: 0 solid <?php echo $bgColor; ?>;
            background-color: <?php echo $bgColor; ?>;
        }

        .footertr:hover {
            background-color: <?php echo $bgColor; ?>;
            padding: 0px;
            margin: 0px;
        }

        .footertr>td {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 50px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2>Selected City with AQI Data</h2>

    <form action="../index.php" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>City</th>
                    <th>AQI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../model/register_model.php';
                selected_cities();
                ?>

            </tbody>
            <tfoot>
                <tr class="footertr">
                    <td colspan="4">
                        <input type="submit" value="Back" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>



</body>

</html>