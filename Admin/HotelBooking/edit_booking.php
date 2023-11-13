<?php

include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $payment = $_POST['payment'];

  
    $sql = "UPDATE hotel_booking SET payment_status = ? WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("si", $payment, $booking_id);

    if ($stmt->execute()) {
        // echo "Record updated successfully";
    
        header("Location: hotelBooking.php");
        exit();
    } else {
        echo "Data update failed: " . $stmt->error;
    }

    $stmt->close();
} else {

    echo "Invalid request";
}


$conn->close();
?>
