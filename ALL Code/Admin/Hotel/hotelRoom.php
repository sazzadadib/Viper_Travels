<?php
session_start();
if (!isset($_SESSION['usertype'])) {
  $usertype = null;
} else {
  $usertype = $_SESSION['usertype'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="roomStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Show Hotel List</title>
    <!-- just for fun............not needed -->
    <script>
        function loadFallbackImage(imageElement) {
            imageElement.onerror = null; 
            imageElement.src = "https://memes.co.in/video/upload/photos/2022/11/cOisZdREjAtV4vEV6gBm_14_aa833ca7f937899595a1347b16ef6e85_image.jpg";
        }
    </script>
</head>
<body>
  <?php  include('../bar.php');  ?>

  
    
    <div class="wrapper">

        <button id="addRoomButton" class="add-room-button"><i class="fas fa-bed"></i>+ ADD Room</button>
      <br> 
      <div class="cards">
       <?php
  
  include ('../connect.php');

  if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'];
    $_SESSION['hotel_id'] = $hotel_id;



  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT DISTINCT * FROM room_info WHERE `hotel_id` = ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $hotel_id);

  $stmt->execute();

  $result = $stmt->get_result();
  

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
          <div class="card">
            <div class="card__img">
                <picture>
                 <figure class="article-image">
                  <img src="<?php echo $row['room_image']; ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)">
                  </figure>
                </picture>
            </div>
            <div class="card__details">
              <h3 for="cozyroom"><?php echo $row['type_name']; ?></h3>
              <div class="address"><?php echo $row['max_pers']; ?> adults</div>
              <div class="price">
                <div class="star">
                  <img src="https://cdn-icons-png.flaticon.com/128/616/616490.png" alt="">
                  <img src="https://cdn-icons-png.flaticon.com/128/616/616490.png" alt="">
                  <img src="https://cdn-icons-png.flaticon.com/128/616/616490.png" alt="">
                  <img src="https://cdn-icons-png.flaticon.com/128/616/616490.png" alt="">
                </div>
                <div class="price__l">
                  <span class="price__label">BDT <?php echo $row['price']; ?> /</span>
                  <span class="measure__label">night</span>
                </div>
              </div>
      
            </div>


          <div class="editdelbtn">
            <!-- Edit Button -->
            <button class="edit-button" onclick="editRoom('<?php echo $row['type_name']; ?>')"><i class="fas fa-edit"></i></button>

            <!-- Delete Button -->
            <button class="delete-button" id="delbtn" onclick="confirmDelete('<?php echo $row['type_name']; ?>')"> <i class="fas fa-trash-alt"></i></button>
            <div id="confirmDialog" style="display: none;">
              <div class="confirm-box">
                <div class="message-box">
                  <p id="confirmMessage">Are you sure you want to Delete?</p>
                  <div class="button-box">
                    <button id="confirmYes" class="yes-button">Yes</button>
                    <button id="confirmNo" class="no-button">No</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>
          <?php
    }
  } else {
    echo "No results";
  }


  $conn->close();
}else{
  echo "Hotel ID Problem";
}
  ?>
       
        </div>
      </div>











      <!-- Add the pop-up window for adding Hotel info -->
    
<div id="addRoomModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
     
      <form id="addRoomForm" action="add_room.php" method="post">
        <div class="container">
          <div class="Roomdata">
            <h2>Add Room Information</h2>
            <label for="roomType">Room Type:</label>
            <select id="roomType" name="roomType" >
              <option>--Select A option--</option>
              <option value="Economic">Economic</option>
              <option value="Standard">Standard</option>
              <option value="Deluxe">Deluxe</option>
            </select>
            <br>
            <br>

            <label for="maxPers">Max Person:</label>
            <input type="text" id="maxPers" name="maxPers">

            <label for="price">Price:</label>
            <input type="text" id="price" name="price">

            <label for="roomImage">Room Image Link:</label>
            <input type="text" id="roomImage" name="roomImage">

          </div>
          
        </div>
        <input type="submit" value="Add Room">
      </form>
    </div>
  </div> 



















      <!-- Edit Hotel Modal -->
  <div id="editRoomModal" class="modal">
    <div class="editmodal-content">
      <span class="close" id="closeEditModal">&times;</span>
      <h2>Edit Hotel Information</h2>
      <form id="editRoomForm" action="edit_room.php" method="post">
        <input type="hidden" id="editRoomtype" name="room_type">

        <label for="editMaxPers">Maximum Person:</label>
        <input type="text" id="editMaxPers" name="Newmaxpers" required>

        <label for="editprice">Room Price:</label>
        <input type="text" id="editprice" name="Newprice" required>

        <label for="editroomImage">Room Image Link:</label>
        <input type="text" id="editroomImage" name="NewroomImage">

        <input type="submit" value="Save Changes">
      </form>
    </div>
  </div>

  <script src="roomListUpdateDelete.js"></script> 
      
</body>
</html>