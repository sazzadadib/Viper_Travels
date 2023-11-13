<?php
include ('../connect.php');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hotelName = $_POST["hotelName"];
    $hotelLoc = $_POST["hotelLoc"];
    $locDistrict = $_POST["locDistrict"];
    $standard = $_POST["standard"];
    $hotelImage = $_POST["hotelImage"];


    $availability1 = $_POST["availability1"];
    $maxPers1 = $_POST["maxPers1"];
    $price1 = $_POST["price1"];
    $roomImage1 = $_POST["roomImage1"];


    $availability2 = $_POST["availability2"];
    $maxPers2 = $_POST["maxPers2"];
    $price2 = $_POST["price2"];
    $roomImage2 = $_POST["roomImage2"];


    $availability3 = $_POST["availability3"];
    $maxPers3 = $_POST["maxPers3"];
    $price3 = $_POST["price3"];
    $roomImage3 = $_POST["roomImage3"];

  
    try {

        $pdo = new PDO("mysql:host=localhost;dbname=project", "root", ""); 

        // Insert into the hotel_info table
        $sql = "INSERT INTO hotel_info (hotel_name, hotel_loc, loc_district, Standard, hotel_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hotelName, $hotelLoc, $locDistrict, $standard, $hotelImage]);
        $hotelId = $pdo->lastInsertId(); 

        // Insert into the room_info table for Economic Room
        $sql = "INSERT INTO room_info (hotel_id, type_name, max_pers, price, room_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if($availability1 == 'eco_yes'){
        $stmt->execute([$hotelId, 'Economic', $maxPers1, $price1, $roomImage1]);
        }

        // Insert into the room_info table for Standard Room
        if($availability2 == 'stan_yes'){
        $stmt->execute([$hotelId, 'Standard', $maxPers2, $price2, $roomImage2]);
        }

        // Insert into the room_info table for Deluxe Room
        if($availability3 == 'delu_yes'){
        $stmt->execute([$hotelId, 'Deluxe', $maxPers3, $price3, $roomImage3]);
        }


        $pdo = null;

    
        header("Location: hotelList.php"); 
    } catch (PDOException $e) {
       
        echo "Database Error: " . $e->getMessage();
    }
}
?>
