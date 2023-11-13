<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['bus_id'])) {
    $busId = $_GET['bus_id'];

    $sql = "SELECT * FROM bus_info WHERE bus_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $busId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {

        $busData = $result->fetch_assoc();
        

        header('Content-Type: application/json');
        echo json_encode($busData);
    } else {

        echo "Bus not found";
    }
    

    $stmt->close();
} else {

    echo "Invalid request";
}


$conn->close();
?>
