<?php
include '../../models/trips copy.php';
$trips = Trip::index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/style.css">
</head>
<body>
    <p class="red">ciao</p>

    <h2>travels</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>id</td>
                    <td>title</td>
                    <td>description</td>
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
                <?php
                if ($trips->num_rows > 0) {
                    // output data of each row
                    while ($row = $trips->fetch_assoc()) {
                        echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["title"] . "</td> <td>" . $row["description"]. "<td> <img src='". $row["image"] ."' style='width: 100px; height:100px;'> </td> </tr>";
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </tbody>
        </table>
</body>
</html>