<?php
include ('../connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['loc_id'])) {
    $locId = $_GET['loc_id'];
    
    
    $sql = "DELETE FROM loc_info WHERE loc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $locId);
    
    if ($stmt->execute()) {
        
        $stmt->close();
        
        
        echo "Loaction entry deleted successfully";
    } else {
       
        echo "Deletion failed: " . $conn->error;
    }
} else {
  
    echo "Invalid request";
}

$conn->close();
?>
