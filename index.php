<?php
//including the database connection file
include_once("db/connection.php");

//fetching data in descending order (lastest entry first)
$trips = $conn->query("SELECT * FROM trips");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>
<body>
    <p>ciao</p>
    <header>
      
    </header>
<div class="container">
<h2>travels</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>title</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>roma</td>
                <td>estate</td>
            </tr>
        </tbody>
    </table>

  <?php 
 if ($trips->num_rows > 0) {
    // output data of each row
    while($row = $trips->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["title"];
    }
  } else {
    echo "0 results";
  }

  ?>
    </div>
</body>
</html>