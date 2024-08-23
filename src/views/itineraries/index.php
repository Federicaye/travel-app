<?php

include __DIR__ . '/../../models/itinerary.php';
$itineraries = Itinerary::index();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
        integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>

<body>
    <div>
        <?php

        include __DIR__ . '/../sidebar.php';
        include __DIR__ . '/../header.php';
        ?>
          
        <div class=" main-content">
            
            <div>
                <h2 class="red">Itineraries</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>title</td>
                            <td>description</td>
                            <td>image</td>
                            <td>detail</td>
                            <td>edit</td>
                            <td>delete</td>
                        </tr>
                    </thead>
                    <img src="" alt="">
                    <tbody>
                        <?php
                        foreach ($itineraries as $itinerary)
                            echo "<tr> <td>" . $itinerary["id"] . "</td> 
                <td>" . $itinerary["title"] . "</td> 
                <td>" . $itinerary["description"] . "</td> 
                <td> <img src='../../../" . $itinerary["image"] . "' style='width: 100px; height:100px;'> </td> 
                <td><a href='/itinerary?id=" . $itinerary["id"] . "'><i class='fa-solid fa-eye'></i> </a></td>
                <td><a href='/itineraries/edit?id=" . $itinerary["id"] . "'><i class='fa-solid fa-pen-to-square'></i> </a></td>
                <td><a href='/itineraries/delete?id=" . $itinerary["id"] . "'><i class='fa-solid fa-trash'></i> </a></td>
                </tr>";
                        ?>
                    </tbody>

                </table>
            </div>
            <img src="/upload/" alt="">
        </div>

    </div>

</body>

</html>