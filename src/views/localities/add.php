<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>
<body>
<?php 
   include __DIR__ . '/../header.php'
   ?>
<div class="container">
    <h2>Add localities</h2>
   <form action="" method="POST" enctype="multipart/form-data">
   <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
       
      </div>
   </form>
   </div>
</body>
</html>