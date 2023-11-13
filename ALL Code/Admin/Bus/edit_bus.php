<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $busId = $_POST['bus_id'];
    $NewbusName = $_POST['NewbusName'];
    $NewstartingPoint = $_POST['NewstartingPoint'];
    $NewendingPoint = $_POST['NewendingPoint'];
    $NewdepartureTime = $_POST['NewdepartureTime'];
    $NewreachedTime = $_POST['NewreachedTime'];
    $NewbusFare = $_POST['NewbusFare'];
    $NewbusImage = $_POST['NewbusImage'];

    $sql = "UPDATE bus_info 
        SET bus_name = ?, 
            starting_point = ?, 
            ending_point = ?, 
            departure_time = ?, 
            reached_time = ?, 
            bus_fare = ?, 
            bus_image = ?
        WHERE bus_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssisi", $NewbusName, $NewstartingPoint, $NewendingPoint, 
    $NewdepartureTime, $NewreachedTime, $NewbusFare, $NewbusImage, $busId);

    
    if ($stmt->execute()) {
        
        $stmt->close();
        header("Location: busList.php");
        exit();
    } else {

        echo "Data update failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}


$conn->close();
?>
