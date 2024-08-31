<?php

include __DIR__ . '/../../models/itinerary.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$itineraryData = Itinerary::show($id);
var_dump($itineraryData);
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>

<body>

  <!-- header -->
  <?php
  include __DIR__ . '/../sidebar.php';
  include __DIR__ . '/../header.php';
  ?>
  <div class="main-content">
    <h2 class="red">Edit itinerary</h2>
    <form action="/itineraries/update" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="title" name="title"
          value="<?php echo $itineraryData['itinerary'][0]['title']; ?>">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" id="description" rows="3"
          name="description"><?php echo $itineraryData['itinerary'][0]['description']; ?></textarea>
      </div>
      <div>
      <label for="travel_time" class="form-label">Travel time</label>
      <input type="number" class="form-control" name="travel_time" min="1" max="60" required>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">

      </div>
      <input type="submit" value="save" name="submit">
      <!-- aggiungi bottone annulla -->
  

     <input type='hidden' name='_method' value='PATCH'>
     <input type='hidden' name='id' value='<?php echo $itineraryData['itinerary'][0]['id']?>'>
    </form>
  </div>
</body>

</html>