<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/style.css">
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>

<body>
  <!-- header -->
  <?php
   

   include __DIR__ . '/../sidebar.php';
   include __DIR__ . '/../header.php';
   
    ?>
  <div class=" main-content">
    <h2 class="red">Add itinerary</h2>
    <form action="/itineraries/store" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="title" name="title">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
      </div>
      <input type="submit" value="save" name="submit">
  </div>

  </form>

  <img src="/image/hero.png" alt="">
</body>

</html>
<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
echo $uri;
