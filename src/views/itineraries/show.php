<?php
$travel_time = $itineraryData['itinerary'][0]['travel_time'];
$travel_days = [];
$scheduled_days = [];
foreach ($itineraryData['destinations'] as $day) {
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
        <p><?php echo $itineraryData['itinerary'][0]['description']; ?></p>

        <?php var_dump($itineraryData) ?>
        <?php

        foreach ($itineraryData['destinations'] as $destination) {
            echo '<img src="../../../' . $destination['image'] . '" alt="">';
        }
        ?>
        
        <h4 class="red">Select the stages of your journey</h4>

        <form action="/destinations/store" method="POST">
        <select class="js-example-basic-multiple" name="locality_id[]" multiple="multiple" style="width: 100%;">
            <?php 
            foreach ($localities as $locality) {
            echo ' <option value="' . $locality['id']  . '">'. $locality['name'] . '</option>';}
            ?>          
        </select>
        <input type="hidden" name="itinerary_id" value="<?php echo $itineraryData['itinerary'][0]['id']; ?>">
        <input type="submit" value="save">
        </form>

        <h4 class="red">Day-to-day plan</h4>
        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>trip day</td>
                        <td>locality</td>
                        <td>image</td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($itineraryData['destinations'] as $destination) {
                        echo '<tr><td>' . $destination['trip_day'] . '</td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                Add a day
            </button>
        </p>
        <div>
            <div class="collapse collapse-vertical" id="collapseWidthExample">
                <div class="card card-body">
                    <form action="/days/store" method="POST" enctype="multipart/form-data">

                        <input type="text" hidden name="itinerary_id"
                            value="<?php echo $itineraryData['itinerary'][0]['id']; ?>">


                        <div class="mb-3">
                            <label for="locality_name" class="form-label">locality</label>
                            <input type="text" id="locality_name" list="locality" name="locality_name"
                                class="form-control">
                            <datalist id="locality">

                            </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="locality_description" class="form-label">description</label>
                            <textarea class="form-control" id="locality_description" rows="3"
                                name="locality_description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
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

                        <input type="submit" value="save" name="submit">

                    </form>
                </div>
            </div>
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