<?php
session_start();
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['type_name'])) {
    $type_name = $_GET['type_name'];
    $hotel_id = $_SESSION['hotel_id'];
    

    $sql = "DELETE FROM room_info WHERE `hotel_id` = ? AND `type_name` = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("is", $hotel_id, $type_name);
    
    if ($stmt->execute()) {

        $stmt->close();

        echo "hotel entry deleted successfully";
    } else {

        echo "Deletion failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}


$conn->close();
?>
