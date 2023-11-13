<?php

include ('../connect.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['username'])) {
    $userName = $_GET['username'];
    

    $sql = "DELETE FROM users_data WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userName);
    
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
