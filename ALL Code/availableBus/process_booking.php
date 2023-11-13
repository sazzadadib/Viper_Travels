<?php
session_start();

include ('../connect.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];
$date = $_SESSION['date'];
$bus_id = $_SESSION['selected_bus_id'];
$bus_fare = $_SESSION['bus_fare'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $seatNumbers = json_decode($_POST['seat_numbers']); 


    $stmt = $conn->prepare("INSERT INTO bus_booking (username, bus_id, seat_number, booking_date, fare) VALUES (?, ?, ?, ?, ? )");


    $stmt->bind_param("sissi", $username, $bus_id, $seatNumber,$date, $bus_fare);
    
    foreach ($seatNumbers as $seatNumber) {
       
        $stmt->execute();
    }

  
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Booking successful!";
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
