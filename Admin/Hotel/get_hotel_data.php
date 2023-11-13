<?php
include ('../connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['hotel_id'])) {
    $hotelId = $_GET['hotel_id'];

    $sql = "SELECT * FROM hotel_info WHERE hotel_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $hotelId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {

        $hotelData = $result->fetch_assoc();
        

        header('Content-Type: application/json');
        echo json_encode($hotelData);
    } else {

        echo "hotel not found";
    }
    

    $stmt->close();
} else {

    echo "Invalid request";
}


$conn->close();
