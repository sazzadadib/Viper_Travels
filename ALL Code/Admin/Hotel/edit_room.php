<?php

session_start();
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_type = $_POST['room_type'];
    $Newmaxpers = $_POST['Newmaxpers'];
    $Newprice = $_POST['Newprice'];
    $NewroomImage = $_POST['NewroomImage'];

    $sql = "UPDATE room_info 
        SET max_pers = ?, 
            price = ?, 
            room_image = ?
        WHERE hotel_id = ? AND type_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iisis", $Newmaxpers, $Newprice, $NewroomImage, $hotelId , $room_type);

    
    if ($stmt->execute()) {
        
        $stmt->close();
        header("Location: hotelList.php");
        exit();
    } else {

        echo "Data update failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}

$conn->close();
