<?php
include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['loc_id'])) {
    $locId = $_GET['loc_id'];
    

    $sql = "SELECT * FROM loc_info WHERE loc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $locId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {

        $locData = $result->fetch_assoc();

        header('Content-Type: application/json');
        echo json_encode($locData);
    } else {

        echo "Bus not found";
    }
    

    $stmt->close();
} else {

    echo "Invalid request";
}

$conn->close();
?>
