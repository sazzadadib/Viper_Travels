<?php
session_start();
if(!isset($_SESSION['usertype'])){
    $usertype = null;
}else{
    $usertype = $_SESSION['usertype'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search_start"]) && isset($_GET["search_end"])) {
    $search_start = $_GET["search_start"];
    $search_end = $_GET["search_end"];
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
    <?php include('../bar.php'); ?>
    <div class="xop-banner"></div>
    <div class="site-container">
        
            <!-- Add the ADD BUS button -->
            <button id="addBusButton" class="add-bus-button"><i class="fas fa-bus"></i>+ ADD BUS</button>
        <br>
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

            $sql = "SELECT * FROM bus_info where starting_point= ? AND ending_point = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $search_start, $search_end);
            $stmt->execute();
            $result = $stmt->get_result();

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
                                <p class="card-excerpt"><b>Departure Time:</b> <?php echo $row['departure_time']; ?></p>
                                <p class="card-excerpt"><b>Reached Time:</b> <?php echo $row['reached_time']; ?></p>
                                <p class="card-excerpt"><b>Bus Fare:</b> <?php echo $row['bus_fare']; ?></p>
                        </div>

                        <div class="editdelbtn">
                                <!-- Edit Button -->
                                <button class="edit-button" onclick="editBus(<?php echo $row['bus_id']; ?>)"><i class="fas fa-edit"></i></button>

                                <!-- Delete Button -->
                                <button class="delete-button" id="delbtn" onclick="confirmDelete(<?php echo $row['bus_id']; ?>)"> <i class="fas fa-trash-alt"></i></button>
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
    <!-- Add the pop-up window for adding bus info -->
    <div id="addBusModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Add Bus Information</h2>
            <form id="addBusForm" action="add_bus.php" method="post">
                <!-- Add input fields for bus information -->
                <label for="busName">Bus Name:</label>
                <input type="text" id="busName" name="busName" required>

                <label for="startingPoint">Starting Point:</label>
                <input type="text" id="startingPoint" name="startingPoint" required>

                <label for="endingPoint">Ending Point:</label>
                <input type="text" id="endingPoint" name="endingPoint" required>

                <label for="departureTime">Departure Time:</label>
                <input type="text" id="departureTime" name="departureTime" required>

                <label for="reachedTime">Reached Time:</label>
                <input type="text" id="reachedTime" name="reachedTime" required>

                <label for="busFare">Bus Fare:</label>
                <input type="text" id="busFare" name="busFare" required>



                <label for="busImage">Bus Image Link:</label>
                <input type="text" id="busImage" name="busImage">

                <!-- Add a submit button to submit the form -->
                <input type="submit" value="Add Bus">
            </form>
        </div>
    </div>


    <!-- Edit Bus Modal -->
    <div id="editBusModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Edit Bus Information</h2>
            <form id="editBusForm" action="edit_bus.php" method="post">
                <input type="hidden" id="editBusId" name="bus_id">

                <label for="editBusName">Bus Name:</label>
                <input type="text" id="editBusName" name="NewbusName" required>

                <label for="startingPoint">Starting Point:</label>
                <input type="text" id="editstartingPoint" name="NewstartingPoint" required>

                <label for="endingPoint">Ending Point:</label>
                <input type="text" id="editendingPoint" name="NewendingPoint" required>

                <label for="departureTime">Departure Time:</label>
                <input type="text" id="editdepartureTime" name="NewdepartureTime" required>

                <label for="reachedTime">Reached Time:</label>
                <input type="text" id="editreachedTime" name="NewreachedTime" required>

                <label for="busFare">Bus Fare:</label>
                <input type="text" id="editbusFare" name="NewbusFare" required>


                <label for="busImage">Bus Image Link:</label>
                <input type="text" id="editbusImage" name="NewbusImage">

                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>

    <script src="busListUpdateDelete.js"></script>
</body>

</html>