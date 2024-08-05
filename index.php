<?php
//including the database connection file
include_once ("db/connection.php");

//fetching data in descending order (lastest entry first)
$trips = $conn->query("SELECT * FROM trips");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <link rel="stylesheet" href="resources/style.css">
</head>

<body>
 <!-- <img src="image/hero.png" alt=""> -->
 <p>Foto di <a href="https://unsplash.com/it/@matteokutufa?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Matteo Kutufa</a> su <a href="https://unsplash.com/it/foto/fotografia-dal-basso-dellinterno-di-un-edificio-gotico-marrone-2YCyGrmFY4w?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></p>
    
    <header>

    </header>
    <div class="hero"></div>
    <div class="container">
        <h2>travels</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>id</td>
                    <td>title</td>
                    <td>description</td>
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
                <?php
                if ($trips->num_rows > 0) {
                    // output data of each row
                    while ($row = $trips->fetch_assoc()) {
                        echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["title"] . "</td> <td>" . $row["description"]. "<td> <img src='". $row["image"] ."' style='width: 100px; height:100px;'> </td> </tr>";
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </tbody>
        </table>


    </div>
</body>

</html>