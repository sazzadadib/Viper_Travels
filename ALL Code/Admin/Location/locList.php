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

    <div class="xop-banner"></div>
    <?php include('../bar.php'); ?>
    <div class="site-container">
            <!-- Add the ADD Location button -->
            <button id="addLocButton" class="add-loc-button"><i class="fas fa-map-marked-alt"></i>+ ADD Location</button>
            <br>
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
                       <div class="editdelbtn">
                                <!-- Edit Button -->
                                <button class="edit-button" onclick="editLoc(<?php echo $row['loc_id']; ?>)"><i class="fas fa-edit"></i></button>

                                <!-- Delete Button -->
                                <button class="delete-button" id="delbtn" onclick="confirmDelete(<?php echo $row['loc_id']; ?>)"> <i class="fas fa-trash-alt"></i></button>
                                <div id="confirmDialog" style="display: none;">
                                    <div class="confirm-box">
                                        <div class="message-box">
                                            <p id="confirmMessage">Are you sure you want to cancel?</p>
                                            <div class="button-box">
                                                <button id="confirmYes" class="yes-button">Yes</button>
                                                <button id="confirmNo" class="no-button">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Add the pop-up window for adding location info -->
    <div id="addLocModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Add Location Information</h2>
            <form id="addLocForm" action="add_loc.php" method="post">

                <label for="locName">Location Name:</label>
                <input type="text" id="locName" name="locName" required>

                <label for="district">District:</label>
                <input type="text" id="district" name="district" required>

                <label for="division">Division:</label>
                <input type="text" id="division" name="division" required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" required>

                <label for="locImage">Location Image:</label>
                <input type="text" id="locImage" name="locImage">

                <!-- Add a submit button to submit the form -->
                <input type="submit" value="Add Loc">
            </form>
        </div>
    </div>


    <!-- Edit Loaction Modal -->
    <div id="editLocModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Edit Location Information</h2>
            <form id="editLocForm" action="edit_loc.php" method="post">
           
                <input type="hidden" id="editLocId" name="loc_id">

                <label for="editLocName">Location Name:</label>
                <input type="text" id="editLocName" name="NewlocName" required>

                <label for="district">district:</label>
                <input type="text" id="editdistrict" name="Newdistrict" required>

                <label for="division">division:</label>
                <input type="text" id="editdivision" name="Newdivision" required>

                <label for="country">country: </label>
                <input type="text" id="editcountry" name="Newcountry" required>

                <label for="locImage">Location Image Link:</label>
                <input type="text" id="editlocImage" name="NewlocImage">

                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>





    <script src="locListUpdateDelete.js"></script>
</body>

</html>