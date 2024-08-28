<?php

include __DIR__ . '/../../models/locality.php';
$localities = locality::index();


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

            <h2 class="red">Localities</h2>
           
            <div class="localities-container">
                <?php
        foreach ($localities as $locality) {
            echo '<div class="localities-card">
            <img class="localities-img" src="../../../' . $locality['image'] . '" alt="Avatar">
            <div class="">
            <h4><b>' . $locality['name'] . '</b></h4>
            <p>' . $locality['description'] . '</p>
            <form action="/destinations/delete" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="' . $locality["id"] . '">
            <button type="submit" class="trash-button"><i class="fa-solid fa-trash brown"></i></button>
            </form>
            </div>
            </div>';
            }
             ?>
        </div>

        </div>
    </div>

</body>

</html>