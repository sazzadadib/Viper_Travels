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
    <title>Show Locations</title>
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
                <form method="GET" action="searchLoc.php"> 
                    <input type="text" placeholder="Search Location by District" name="search_query">
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

        
            $sql = "SELECT DISTINCT * FROM loc_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <article class="article-card">
                        <figure class="article-image">
                            <img class="fallback-image" src="<?php echo $row["loc_image"] ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)" />
                        </figure>
                        <div class="article-content">
                            <h3 class="card-title"><?php echo $row['loc_name']; ?></h3>
                            <p class="card-excerpt">District: <?php echo $row['district']; ?></p>
                            <p class="card-excerpt">Division: <?php echo $row['division']; ?></p>
                            <p class="card-excerpt">Country: <?php echo $row['country']; ?></p>
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