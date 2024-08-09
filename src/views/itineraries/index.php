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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>
<body>
    <p class="red">ciao</p>
<div class="container">
    <h2>travels</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>id</td>
                    <td>title</td>
                    <td>description</td>
                    <td>image</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
                <?php
               foreach ($trips as $trip)
                echo "<tr> <td>" . $trip["id"] . "</td> 
                <td>" . $trip["title"] . "</td> 
                <td>" . $trip["description"] . "</td> 
                <td> <img src='". $trip["image"] . "' style='width: 100px; height:100px;'> </td> 
                <td><a href='../../controllers/itineraries/edit.php'><i class='fa-solid fa-pen-to-square'></i></a>  </td>
                <td><a href='../../controllers/itineraries/edit.php" . $trip["id"] . "'><i class='fa-solid fa-trash'></i></a> </td>
                </tr>";
                ?>
            </tbody>
        </table>
        </div>
</body>
<a href="../../controllers/itineraries/edit.php"><i class="fa-solid fa-pen-to-square"></i></a>
<a href="../../controllers/itineraries/edit.php?id=$trip[id]"><i class="fa-solid fa-trash"></i></a>
</html>