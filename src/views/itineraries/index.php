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

            <h2 class="red">Itineraries</h2>
            <div class="table-responsive-lg">
                <table class="table table-hover">
                    <thead class="itiTable">
                        <tr>
                           
                            <th>title</th>
                            <th>description</th>
                            <th>image</th>
                            <th>detail</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <?php
                        foreach ($itineraries as $itinerary)
                            echo "<tr> 
                <td>" . $itinerary["title"] . "</td> 
                <td>" . $itinerary["description"] . "</td> 
                <td> <img src='../../../" . $itinerary["image"] . "' style='width: 100px; height:100px;'> </td> 
                <td><button class='crud-button show-button'><a href='/itineraries/show?id=" . $itinerary["id"] . "'><i class='fa-solid fa-eye'></i></a></button></td>
                <td><button class='crud-button edit-button'><a href='/itineraries/edit?id=" . $itinerary["id"] . "'><i class='fa-solid fa-pen'></i> </a></button></td>

                <td><form action='/itineraries/delete' method='POST'>
                <input type='hidden' name='_method' value='DELETE'>
                <input type='hidden' name='id' value='" . $itinerary["id"] . "'>
                <button type='submit' class='crud-button trash-button'><i class='fa-solid fa-trash-can'></i></button>
                </form>
                </td>
                </tr>";
                        ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</body>

</html>