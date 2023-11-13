<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['booking_id'])) {
    $bookingId = $_GET['booking_id'];

    $sql = "DELETE FROM bus_booking WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingId);
    
    if ($stmt->execute()) {

        $stmt->close();
        

        echo "booking entry deleted successfully";
    } else {

        echo "Deletion failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}


$conn->close();
?>
