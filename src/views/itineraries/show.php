<?php
session_start();

$travel_time = $itineraryData['itinerary'][0]['travel_time'];
$travel_days = [];
$scheduled_days = [];
foreach ($days as $day) {
    array_push($scheduled_days, $day['trip_day']);
}

for ($i = 1; $i <= $travel_time; $i++) {
    array_push($travel_days, $i);
}

$day_left = array_diff($travel_days, $scheduled_days);

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

        <h2><?php echo $itineraryData['itinerary'][0]['title']; ?></h2>
        <h5><?php echo $itineraryData['itinerary'][0]['description']; ?></h5>

        <hr>
        <?php if ($itineraryData['destinations'])
            echo '<h6 class="red text-uppercase">Stages</h6>'
                ?>

            <div class="localities-container">
                <?php
        foreach ($itineraryData['destinations'] as $destination) {
            echo '<div class="localities-card">
                  <img class="localities-img" src="../../../' . $destination['image'] . '" alt="Avatar">
                  <div class="">
                  <h6 class="text-center">' . $destination['name'] . '</h6>
                   <p>' . $destination['description'] . '</p>
                 <form action="/destinations/delete" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="' . $destination["id"] . '">
                  <input type="hidden" name="id_itinerary_show" value="' . $itineraryData['itinerary'][0]['id'] . '">
                   <button type="submit" class="trash-button"><i class="fa-regular fa-trash-can"></i></i></button>
                   </form>
                   </div>
                  </div>';
        }
        ?>
        </div>

        <!-- AGGIUNGI DESTINAZIONI -->

        <div class="d-flex justify-content-between">

            <?php

            if (isset($_SESSION['destinationsAdded']) && !empty($_SESSION['destinationsAdded'])) {
                foreach ($_SESSION['destinationsAdded'] as $destination) {
                    echo '<p class="red">' . $destination . ' is already added </p>';
                }
            } else {
              echo  '<div class="invisible">placeholder</div>';
            }
            $_SESSION['destinationsAdded'] = [];
            ?>

          
            <button class="btn button-brown right" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Add stage <i class="fa-solid fa-caret-down"></i>
            </button>
        </div>


        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="/destinations/store" method="POST">
                    <select class="js-example-basic-multiple" name="locality_id[]" multiple="multiple"
                        style="width: 100%;" required>
                        <?php
                        foreach ($localities as $locality) {
                            echo ' <option value="' . $locality['id'] . '">' . $locality['name'] . '</option>';
                        }
                        ?>
                    </select>


                    <input type="hidden" name="itinerary_id"
                        value="<?php echo $itineraryData['itinerary'][0]['id']; ?>">
                    <button type="submit" class="button-brown">save</button>

                </form>
            </div>
        </div>

        <hr>
        <!-- TABELLA DELLE GIORNATE -->
        <h6 class="red text-uppercase">Day-to-day plan</h6>
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
        <!-- AGGIUNGI UNA GIORNATA -->
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary button-brown" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                Add a day <i class="fa-solid fa-caret-down"></i>
            </button>
        </div>
        <div>
            <div class="collapse collapse-vertical" id="collapseWidthExample">
                <div class="card card-body">
                    <form action="/days/store" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="trip_destination_id" class="form-label">destination</label>
                            <select name="trip_destination_id" id="trip_destination_id">

                                <?php
                                foreach ($itineraryData['destinations'] as $i => $destination) {
                                    echo '<option value="' . $itineraryData['destinations'][$i]['id'] . '">' . $itineraryData['destinations'][$i]['name'] . ' </option>';
                                }
                                ?>

                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="trip_day" class="form-label">trip day</label>
                            <select name="trip_day">
                                <?php
                                foreach ($day_left as $day) {
                                    echo "<option value='" . $day . "'> " . $day . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <input type="hidden" value="<?php echo $itineraryData['itinerary'][0]['id'] ?>" name="id">
                        <input type="submit" value="save" name="submit">

                    </form>
                </div>
            </div>
        </div>

        <table class="ptova">
            <thead>
                <tr>
                    <td>
                        ciao
                    </td>
                    <td>
                        ciao
                    </td>
                </tr>
            </thead>
        </table>
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