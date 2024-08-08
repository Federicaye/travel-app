<?php
include '../../models/itinerary.php';
$trips = Trip::index();
var_dump($trips);

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
               foreach ($trips as $trip)
                echo "<tr> <td>" . $trip["id"] . "</td> <td>" . $trip["title"] . "</td> <td>" . $trip["description"]. "<td> <img src='". $trip["image"] ."' style='width: 100px; height:100px;'> </td> </tr>";
                ?>
            </tbody>
        </table>
</body>
</html>