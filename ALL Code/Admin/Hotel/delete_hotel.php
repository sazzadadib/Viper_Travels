<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['hotel_id'])) {
    $hotelId = $_GET['hotel_id'];
    
    $sql = "DELETE FROM hotel_info WHERE hotel_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $hotelId);
    
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
