<?php
include __DIR__ . '/../../models/locality.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$locality = locality::show($id);

?>
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
 
   
    ?>
    <div class="main-content">
        <?php 
         var_dump($locality);
        ?>
        <h2 class="red"> <?php echo $locality[0]['name']?></h2>
        <p> <?php echo $locality[0]['description']?></p>
        <p> <?php echo $locality[0]['name']?></p>
        <img src="../../../<?php echo $locality[0]['image']?>" class="localityImage" alt="">
    </div>
    
</body>

</html>