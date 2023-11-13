<?php
session_start();
if (!isset($_SESSION['usertype'])) {
    $usertype = null;
} else {
    $usertype = $_SESSION['usertype'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search_query"])) {
    $search_query = $_GET["search_query"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">
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



  <?php include('../bar.php');  ?>

  <!-- ADD Hotel Button -->
  <button id="addHotelButton" class="add-hotel-button"><i class="fas fa-hotel"></i>+ ADD Hotel</button>
  <br>

  <div class="search-bar">
    <form method="GET" action="searchHotel.php">
      <input type="text" placeholder="Search Hotel by District" name="search_query">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
  <br>



  <div class="allcontent">

    <?php

    include('../connect.php');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM hotel_info where loc_district = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $search_query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <div class="wrapper">
          <h1><?php echo $row['loc_district']; ?></h1>
          <a href='hotelRoom.php?hotel_id=<?php echo $row['hotel_id']; ?>'>
            <div class="hotelimage"> <img src="<?php echo $row['hotel_image']; ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)" /></div>
            <div class="hoteldetails">
              <h1><em><?php echo $row['hotel_loc']; ?></em></h1>
              <h2><?php echo $row['hotel_name']; ?></h2>
              <p>
                <?php
                $hotelStandard = $row['Standard'];

                for ($i = 1; $i <= $hotelStandard; $i++) { ?>

              <div class="star">
                <img class="starimg" src="https://cdn-icons-png.flaticon.com/128/1828/1828614.png" alt="">
              </div>

            <?php
                }
            ?>
            </p>
            </div>
            <?php
            $sql2 = "SELECT DISTINCT * FROM room_info WHERE (`type_name`='Standard' OR `type_name`='Economic') AND `hotel_id` = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("i", $row['hotel_id']);
            $stmt2->execute();

            $result2 = $stmt2->get_result();
            $row2 = $result2->fetch_assoc()
            ?>
          </a>
          <h1>Starting Price: <?php echo $row2['price']; ?> BDT</h1>

          <br><br>

          <div class="editdelbtn">
            <!-- Edit Button -->
            <button class="edit-button" onclick="editHotel(<?php echo $row['hotel_id']; ?>)"><i class="fas fa-edit"></i></button>

            <!-- Delete Button -->
            <button class="delete-button" id="delbtn" onclick="confirmDelete(<?php echo $row['hotel_id']; ?>)"> <i class="fas fa-trash-alt"></i></button>
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
    ?>
  </div>

  <!-- Add the pop-up window for adding Hotel info -->
  <div id="addHotelModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <form id="addHotelForm" action="add_hotel.php" method="post">
        <div class="container">
          <div class="hoteldata">
            <h2>Add Hotel Information</h2>
            <label for="hotelName">Hotel Name:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="hotelLoc">Hotel Loaction:</label>
            <input type="text" id="hotelLoc" name="hotelLoc" required>

            <label for="locDistrict">Loaction District:</label>
            <input type="text" id="locDistrict" name="locDistrict" required>

            <label for="standard">Standard:</label>
            <input type="text" id="standard" name="standard" required>

            <label for="hotelImage">Hotel Image Link:</label>
            <input type="text" id="hotelImage" name="hotelImage">

          </div>

          <div class="roomdata">
            <h3>Add Economic Information</h3>
            <label for="availability1">Availability:</label>
            <select id="availability1" name="availability1">
              <option value="eco_no">No</option>
              <option value="eco_yes">Yes</option>
            </select>
            <br>
            <input type="hidden" id="roomType1" name="roomType1" value="Economic">

            <label for="maxPers1">Max Person:</label>
            <input type="text" id="maxPers1" name="maxPers1">

            <label for="price1">Price:</label>
            <input type="text" id="price1" name="price1">

            <label for="roomImage1">Room Image Link:</label>
            <input type="text" id="roomImage1" name="roomImage1">
            <h3>Add Standard Information</h3>
            <label for="availability2">Availability:</label>
            <select id="availability2" name="availability2">
              <option value="stan_no">No</option>
              <option value="stan_yes">Yes</option>
            </select>
            <br>
            <input type="hidden" id="roomType2" name="roomType2" value="Standard">

            <label for="maxPers2">Max Person:</label>
            <input type="text" id="maxPers2" name="maxPers2">

            <label for="price2">Price:</label>
            <input type="text" id="price2" name="price2">

            <label for="roomImage2">Room Image Link:</label>
            <input type="text" id="roomImage2" name="roomImage2">
            <h3>Add Deluxe Information</h3>
            <label for="availability3">Availability:</label>
            <select id="availability3" name="availability3">
              <option value="delu_no">No</option>
              <option value="delu_yes">Yes</option>
            </select>
            <br>
            <input type="hidden" id="roomType3" name="roomType3" value="deluxe">

            <label for="maxPers3">Max Person:</label>
            <input type="text" id="maxPers3" name="maxPers3">

            <label for="price3">Price:</label>
            <input type="text" id="price3" name="price3">

            <label for="roomImage3">Room Image Link:</label>
            <input type="text" id="roomImage3" name="roomImage3">

          </div>

        </div>
        <input type="submit" value="Add Hotel">
      </form>
    </div>
  </div>


  <!-- Edit Hotel Modal -->
  <div id="editHotelModal" class="modal">
    <div class="editmodal-content">
      <span class="close" id="closeEditModal">&times;</span>
      <h2>Edit Hotel Information</h2>
      <form id="editHotelForm" action="edit_hotel.php" method="post">

        <input type="hidden" id="editHotelId" name="hotel_id">

        <label for="editHotelName">Hotel Name:</label>
        <input type="text" id="editHotelName" name="NewhotelName" required>

        <label for="edithotelLoc">Hotel Loaction:</label>
        <input type="text" id="edithotelLoc" name="NewhotelLoc" required>

        <label for="editlocDistrict">Loaction District:</label>
        <input type="text" id="editlocDistrict" name="NewlocDistrict" required>

        <label for="editstandard">Standard:</label>
        <input type="text" id="editstandard" name="Newstandard" required>

        <label for="edithotelImage">Hotel Image Link:</label>
        <input type="text" id="edithotelImage" name="NewhotelImage">


        <input type="submit" value="Save Changes">
      </form>
    </div>
  </div>


  <script src="hotelListUpdateDelete.js"></script>
</body>

</html>