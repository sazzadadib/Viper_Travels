<?php
session_start();
if (!isset($_SESSION['usertype'])) {
  $usertype = null;
} else {
  $usertype = $_SESSION['usertype'];
}
$to = $_SESSION['to'];

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


  <?php
  include('../navbar.php');
  ?>
  <br>
  <br>
  <?php
  
  include ('../connect.php');

  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  
  $sql = "SELECT * FROM hotel_info where loc_district = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $to);
    $stmt->execute();
    $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>

      <div class="wrapper">
        <h1><?php echo $row['loc_district']; ?></h1>
        <a href='hotelRoom.php?hotel_id=<?php echo $row['hotel_id']; ?>'>
          <div class="image"> <img src="<?php echo $row['hotel_image']; ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)" /></div>
          <div class="details">
            <h1><em><?php echo $row['hotel_loc']; ?></em></h1>
            <h2><?php echo $row['hotel_name']; ?></h2>
            <p>
              <?php
              $hotelStandard = $row['Standard'];

              for ($i = 1; $i <= $hotelStandard; $i++) { ?>
          
            <div class="star">
              <img src="https://cdn-icons-png.flaticon.com/128/1828/1828614.png" alt="">
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

      </div>

  <?php
    }
  } else {
    echo "No results";
  }


  $conn->close();
  ?>


</body>

</html>