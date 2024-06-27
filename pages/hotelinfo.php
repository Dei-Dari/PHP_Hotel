<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Info</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/info.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
        .carousel-item {
            width: 100%; 
            height: 600px; 
            background-color: rgba(200,200,255,0.5); 
        }

        .carousel-item img {
            width: auto; 
            height: 100%; 
            margin: auto; 
            display: block; 
        }
    </style>
</head>

<body>
    <?php
include_once("functions.php");
if (isset($_GET['hotel'])) {
    $hotel = $_GET['hotel'];
    $mysql = connect();
    $sel = 'SELECT * FROM hotels WHERE id=' . $hotel;
    $res = mysqli_query($mysql, $sel);
    $row = mysqli_fetch_array($res, MYSQLI_NUM);
    $hname = $row[1];
    $hstars = $row[4];
    $hcost = $row[5];
    $hinfo = $row[6];
    mysqli_free_result($res);
    echo '<div><h2 class="text-uppercase textcenter">' . $hname . '</h2></div>';
    echo '<div>';
    // класс отеля
    for ($i = 0; $i < $hstars; $i++) {
        echo '<image src="../images/star.png" alt="star">';
    }
    echo '</div>';

}

$mysql = connect();
$sel = 'SELECT imagepath FROM images WHERE hotelid=' . $hotel;
$res = mysqli_query($mysql, $sel);


echo '<div class="container">';
echo '<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">';
echo '<div class="carousel-inner">';
$i = 0;
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    $activeClass = $i === 0 ? 'active' : '';

    echo '<div class="carousel-item ' . $activeClass . '">';
    echo '<img src="../' . $row[0] . '" class="d-block h-100" alt="Image ' . ($i + 1) . '">';
    echo '</div>';
    $i++;
}
mysqli_free_result($res);

echo '</div>';
//echo $_SESSION['ruser'];

if (isset($_SESSION['ruser'])) {
    echo $_SESSION['ruser'];
    echo '<div><h2 class="text-center">Cost<span class="label label-info"> $&nbsp' . $hcost . ' </span></div>';
}

//echo '<a href="#" class="btn btn-success">Book This Hotel</a></h2>';

//echo '</div><div class="col-md-6"><p class="well">' . $hinfo . '</p></div>';
//echo '</div></main>';

?>
         </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</main>
   

    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/gallery.js"></script>
    <script src="../js/info2.js"></script>
</body>
</html>
