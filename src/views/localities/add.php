<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
    integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=='
    crossorigin='anonymous' referrerpolicy='no-referrer' />

  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <?php
  include __DIR__ . '/../sidebar.php';
  include __DIR__ . '/../header.php';
  ?>
  <div class=" main-content">

    <form action="/localities/store" method="POST" enctype="multipart/form-data">


      <div class="mb-3">
        <label for="locality_name" class="form-label">locality</label>
        <input type="text" id="locality_name" list="locality" name="locality_name" class="form-control" required>
        <datalist id="locality">

        </datalist>
      </div>
      <div class="mb-3">
        <label for="locality_description" class="form-label">description</label>
        <textarea class="form-control" id="locality_description" rows="3" name="locality_description"></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
      </div>

      <button type="submit" class="button-brown " name="submit">save</button>

    </form>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="/script.js" type="module"> </script>
</body>

</html>