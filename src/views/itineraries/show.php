<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>

    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?php
    include __DIR__ . '/../../views/header.php';
    ?>
    <div class="container">
        <h2><?php echo $itinerary[0]['title']; ?></h2>
        <p><?php echo $itinerary[0]['description']; ?></p>

        <h2>add a stop</h2>

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                Add a stop
            </button>
        </p>
        <div>
            <div class="collapse collapse-vertical" id="collapseWidthExample">
                <div class="card card-body" style="width: 1300px;">
                    <form action="/stops/store" method="POST" enctype="multipart/form-data">

                        <input type="text" hidden name="itinerary_id" value="<?php echo $itinerary[0]['id']; ?>">

                        
                        <div class="mb-3">
                            <label for="locality_name" class="form-label">locality</label>
                            <input type="text" id="locality_name" list="locality" name="locality_name" class="form-control">
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
</body>

</html>