<?php 
session_start();
if (!isset($_SESSION['username'])) {

  $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];


  header("Location: ../loginPage/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Hotel Room</title>
  <link rel="stylesheet" type="text/css" href="bookstyles.css">
  <!-- just for fun............not needed -->
  <script>
        function loadFallbackImage(imageElement) {
            imageElement.onerror = null; 
            imageElement.src = "https://memes.co.in/video/upload/photos/2022/11/cOisZdREjAtV4vEV6gBm_14_aa833ca7f937899595a1347b16ef6e85_image.jpg";
        }
    </script>
</head>

<body>
<?php  include('../navbar.php');  ?>
  <br> <br>

<?php
  
  if (isset($_GET['type_name'])) {
    $type_name= $_GET['type_name'];
    $_SESSION['type_name'] = $type_name;



    $hotel_id = $_SESSION['hotel_id'];
    


    include ('../connect.php');


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "SELECT DISTINCT * FROM room_info WHERE `hotel_id` = ? AND `type_name` = ?";
  $stmt = $conn->prepare($sql);


  $stmt->bind_param("is", $hotel_id, $type_name);

 
  $stmt->execute();

  $result = $stmt->get_result();
  

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['room_price'] = $row['price'];
      $_SESSION['room_image'] = $row['room_image'];
  ?>
  <div class="container">
    <div class="cards">
    
      <div class="card">
        <div class="card__img">
          <picture>
             <figure class="article-image">
                  <img src="<?php echo $row['room_image']; ?>" alt=".....Coming Soooon......" onerror="loadFallbackImage(this)">
              </figure>
          </picture>
        </div>
        <div class="card__details">
          <h3 for="cozyroom"><?php echo $row['type_name'] ?></h3>
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
      </div>
    </div>
   
    <div class="bookcont">
      <h1>Book Hotel Room</h1>
      <form action="process_booking.php" method="post">
        <div class="form-row">
          <div class="form-group">
            <label for="check_in">Check-in Date:</label>
            <input type="date" id="check_in" name="check_in" required>
          </div>
          <div class="form-group">
            <label for="check_out">Check-out Date:</label>
            <input type="date" id="check_out" name="check_out" required>
          </div>
        </div>

        <div class="form-group">
          <label for="adults">Number of Adults:</label>
          <input type="number" id="adults" name="adults" required min="0">
        </div>

        <div class="form-group">
          <label for="quantity">Quantity of Rooms:</label>
          <input type="number" id="quantity" name="quantity" required min="1">
        </div>

        <div class="form-group">
          <input type="submit" value="Book Now">
        </div>
      </form>
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
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    var checkInInput = document.getElementById("check_in");
    var checkOutInput = document.getElementById("check_out");
    var today = new Date().toISOString().split("T")[0]; 

    checkInInput.addEventListener("change", function () {
      if (this.value < today) {
        alert("Check-in date cannot be in the past");
        this.value = today; 
      }
    });

    checkOutInput.addEventListener("change", function () {
      var checkInDate = new Date(checkInInput.value);
      var checkOutDate = new Date(checkOutInput.value);

      if (checkOutDate <= checkInDate) {
        alert("Check-out Date must be greater than Check-in Date.");
        checkOutInput.value = ""; 
      }
    });
  });
</script>
<?php include('../footer.php'); ?>

</body>

</html>