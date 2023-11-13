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
  <?php include('../navbar.php');  ?>
  <br> <br>



  <div class="wrapper">
    <?php if ($usertype == 'admin') { ?>
      <button id="addRoomButton" class="add-hotel-button"><i class="fas fa-bed"></i>+ ADD Room</button>
      <br> <br>
    <?php } ?>
    <div class="cards">
      <?php

      if (isset($_GET['hotel_id'])) {
        $hotel_id = $_GET['hotel_id'];
        $_SESSION['hotel_id'] = $hotel_id;


        include ('../connect.php');

   
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT DISTINCT * FROM room_info WHERE `hotel_id` = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $hotel_id);


        $stmt->execute();


        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

      ?>
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
                <a href='bookRoom.php?type_name=<?php echo $row['type_name']; ?>'><button><b>Book Room</b></button></a>
              </div>
            </div>
      <?php
          }
        } else {
          echo "No results";
        }

        $conn->close();
      } else {
        echo "Hotel ID Problem";
      }
      ?>

    </div>
  </div>

  <?php include('../footer.php'); ?>

</body>

</html>