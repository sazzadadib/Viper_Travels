<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['bus_id'])) {
    $busId = $_GET['bus_id'];
    
    $sql = "DELETE FROM bus_info WHERE bus_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $busId);
    
    if ($stmt->execute()) {

        $stmt->close();
        

        echo "Bus entry deleted successfully";
    } else {

        echo "Deletion failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}


$conn->close();
?>
