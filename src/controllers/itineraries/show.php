<?php


include __DIR__ . '/../../models/itinerary.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$itinerary = Itinerary::show($id);
echo $parameters; 
var_dump($itinerary);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $itinerary[0]['title']; ?></h2>
    <p><?php echo $itinerary[0]['description']; ?></p>
</body>
</html>