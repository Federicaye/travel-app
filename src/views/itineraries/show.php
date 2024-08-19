<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>

<body>
    <?php
    include __DIR__ . '/../../views/header.php';
    ?>
    <div class="container">
        <h2><?php echo $itinerary[0]['title']; ?></h2>
        <p><?php echo $itinerary[0]['description']; ?></p>



        <form action="/stops/store" method="POST" enctype="multipart/form-data">

        <input type="text" hidden name="itinerary_id" value="<?php echo $itinerary[0]['id']; ?>">

            <div class="mb-3">
                <label for="locality_name" class="form-label">locality</label>
                <input type="text" class="form-control" id="locality_name" placeholder="locality" name="locality_name">
            </div>

            <div class="mb-3">
                <label for="locality_description" class="form-label">description</label>
                <textarea class="form-control" id="locality_description" rows="3" name="locality_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            </div>
            <input type="submit" value="save" name="submit">

        </form>
    </div>
</body>

</html>