<?php
session_start();
?>



<?php
 include ('../connect.php');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $typeName = $_POST["roomType"];
    $maxPers1 = $_POST["maxPers"];
    $price1 = $_POST["price"];
    $roomImage1 = $_POST["roomImage"];
  
    try {
        
        $hotelId = $_SESSION['hotel_id'];

    
        $sql = "INSERT INTO room_info (hotel_id, type_name, max_pers, price, room_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
      
        $stmt->execute([$hotelId, $typeName, $maxPers1, $price1, $roomImage1]);

    
        header("Location: hotelList.php"); 
    } catch (PDOException $e) {
       
        echo "Database Error: " . $e->getMessage();
    }
}
?>
