<?php
session_start();

$_SESSION['from'] = $_POST['from'];
$_SESSION['to'] = $_POST['to'];
$_SESSION['date'] = $_POST['date'];
// $_SESSION['transport_type'] = $transportType;

$from = $_SESSION['from'];
$to = $_SESSION['to'];
$date = $_SESSION['date'];
// $transportType = $_SESSION['transport_type'];




if(!isset($_SESSION['usertype'])){
    $usertype = null;
}else{
    $usertype = $_SESSION['usertype'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Show BUS List</title>
    <!-- just for fun............not needed -->
    <script>
        function loadFallbackImage(imageElement) {
            imageElement.onerror = null; 
            imageElement.src = "https://memes.co.in/video/upload/photos/2022/11/cOisZdREjAtV4vEV6gBm_14_aa833ca7f937899595a1347b16ef6e85_image.jpg";
        }
    </script>
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="xop-banner"></div>
    <div class="site-container">        
        <?php echo "<h1> $from to $to Bus Records</h1>";?>

        <div class="article-container">
            <?php
       
       include ('../connect.php');

          
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

       
            $from = mysqli_real_escape_string($conn, $from);
            $to = mysqli_real_escape_string($conn, $to);

            $sql2 = "SELECT * FROM bus_info WHERE starting_point = '$from' AND ending_point = '$to'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
            ?>

                    <article class="article-card">
                        <figure class="article-image">
                            <img class="fallback-image" src="<?php echo $row["bus_image"] ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)" />
                        </figure>
                        <div class="article-content">
                            <h3 class="card-title"><?php echo $row['bus_name']; ?></h3>
                            <p class="card-excerpt"><b>Bus ID:</b> <?php echo $row['bus_id']; ?></p>
                            <p class="card-excerpt"><b>Starting Point:</b> <?php echo $row['starting_point']; ?></p>
                            <p class="card-excerpt"><b>Ending Point:</b> <?php echo $row['ending_point']; ?></p>               
                            <p class="card-excerpt"><b>Departure Time:</b> <?php echo $row['departure_time']; ?></p>
                            <p class="card-excerpt"><b>Reached Time:</b> <?php echo $row['reached_time']; ?></p>
                            <p class="card-excerpt"><b>Bus Fare:</b> <?php echo $row['bus_fare']; ?></p>
                            
                           
                        </div>
                            <div class="editdelbtn">
                    
                                <a class="booking" href='../availableBus/book.php?bus_id=<?php echo $row['bus_id'];?>'><i class="fas fa-plus"></i> Book</a>
                            </div>
                    </article>
            <?php
                }
            } else {
                echo "No Bus Available.";
            }

           
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>