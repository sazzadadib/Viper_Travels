<?php
session_start();
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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Show Bus List</title>
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
            <div class="search-bar">
                <form method="GET" action="searchBus.php"> 
                    <input type="text" placeholder="Starting Point" name="search_start">
                    <input type="text" placeholder="Ending Point" name="search_end">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        <br>

        <div class="article-container">
            <?php
          
            include ('../connect.php');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT DISTINCT * FROM bus_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
                            <?php
                            if ($usertype == 'admin') { ?>

                                <p class="card-excerpt"><b>Departure Time:</b> <?php echo $row['departure_time']; ?></p>
                                <p class="card-excerpt"><b>Reached Time:</b> <?php echo $row['reached_time']; ?></p>
                                <p class="card-excerpt"><b>Bus Fare:</b> <?php echo $row['bus_fare']; ?></p>
                            <?php } ?>
                        </div>
                        
                    </article>
            <?php
                }
            } else {
                echo "No results";
            }

            
            $conn->close();
            ?>
        </div>
    </div>

<?php include('../footer.php'); ?>

</body>

</html>