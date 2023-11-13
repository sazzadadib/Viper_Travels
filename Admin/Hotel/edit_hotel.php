<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotelId = $_POST['hotel_id'];
    $NewhotelName = $_POST['NewhotelName'];
    $NewhotelLoc = $_POST['NewhotelLoc'];
    $NewlocDistrict = $_POST['NewlocDistrict'];
    $Newstandard = $_POST['Newstandard'];
    $NewhotelImage = $_POST['NewhotelImage'];

    $sql = "UPDATE hotel_info 
        SET hotel_name = ?, 
            hotel_loc = ?, 
            loc_district = ?, 
            Standard = ?, 
            hotel_image = ?
        WHERE hotel_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssisi", $NewhotelName, $NewhotelLoc, $NewlocDistrict, 
    $Newstandard, $NewhotelImage, $hotelId);

    
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
?>
