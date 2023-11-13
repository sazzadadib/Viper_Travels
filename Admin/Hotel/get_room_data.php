<?php
session_start();
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['type_name'])) {
    $type_name = $_GET['type_name'];
    $hotel_id = $_SESSION['hotel_id'];

    
    $sql = "SELECT DISTINCT * FROM room_info WHERE `hotel_id` = ? AND `type_name` = ?";
    $stmt = $conn->prepare($sql);
  
    $stmt->bind_param("is", $hotel_id, $type_name);

    $stmt->execute();
  

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {

        $roomData = $result->fetch_assoc();
        

        header('Content-Type: application/json');
        echo json_encode($roomData);
    } else {

        echo "room not found";
    }
    

    $stmt->close();
} else {

    echo "Invalid request";
}


$conn->close();
?>
