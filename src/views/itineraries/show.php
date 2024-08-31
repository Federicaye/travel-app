<?php 
session_start(); 

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- SELECT2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- BOOTSTRAP -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
            integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <!-- FONT AWESOME -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
            integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=='
            crossorigin='anonymous' referrerpolicy='no-referrer' />

        <link rel="stylesheet" href="/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- SELECT 2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body>
        <?php
        include __DIR__ . '/../sidebar.php';
        include __DIR__ . '/../header.php';
        ?>
        <div class=" main-content">

            <div class="itinerary-details">
                <div class="itinerary-image-container">
                    <a href="../../../<?=$itineraryData['itinerary'][0]['image'];?>" target="_blank" class="">
                        <img src="../../../<?=$itineraryData['itinerary'][0]['image'];?>" alt="itinerary image"
                            class="itinerary-image">
                    </a>
                </div>
                <div class="d-flex flex-column justify-content-between itinerary-text">
                    <div>
                        <h2><?php echo $itineraryData['itinerary'][0]['title']; ?></h2>
                        <p>Travel time:
                            <?php echo $itineraryData['itinerary'][0]['travel_time'];
                            if ($itineraryData['itinerary'][0]['travel_time'] > 1) {
                                echo ' days';
                            } else
                                echo ' day'; ?>
                        </p>
                        <h5><?php echo $itineraryData['itinerary'][0]['description']; ?></h5>
                    </div>

                </div>

            </div>

            <hr>
            <h6 class="blue text-uppercase">Stages</h6>
            <?php if (!$itineraryData['destinations'])
                echo '<p class="red">No stages saved</p>'
                    ?>

                <div class="localities-container">
                    <?php
            foreach ($itineraryData['destinations'] as $destination) {
                echo '<div class="localities-card">
                  <img class="localities-img" src="../../../' . $destination['image'] . '" alt="Avatar">
                  <div class="">
                  <h6 class="text-center">' . $destination['name'] . '</h6>
                   <p>' . $destination['description'] . '</p>
                   </div>
                  </div>';
            }
            ?>
            </div>

            <hr>
            <!-- TABELLA DELLE GIORNATE -->
            <h6 class="blue text-uppercase">Day-to-day plan</h6>
            <?php if (!$days)
                echo '<p class="red">No days saved</p>'
                    ?>
                <div class="table-responsive-lg">
                    <table class="table table-hover">
                        <thead class="destTable">
                            <tr>
                                <th>trip day</th>
                                <th>locality</th>
                                <th>activities</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

            foreach ($days as $i => $day) {
                echo '<tr><td>' . $day['trip_day'] . '</td>
                        <td>' . $day['locality_name'] . '</td>
                        <td>' . $day['locality_name'] . '</td>
                        <td>' . $day['locality_name'] . '</td>
                        <td>' . $day['locality_name'] . '</td></tr>';
            }
            ?>
                    </tbody>
                </table>
            </div>
               
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="/script.js" type="module"> </script>
        <script>$(document).ready(function () {
                $('.js-example-basic-multiple').select2();
            });</script>
    </body>

    </html>