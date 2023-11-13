<?php
include ('../connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $locId = $_POST['loc_id'];
    $NewlocName = $_POST['NewlocName'];
    $Newdistrict = $_POST['Newdistrict'];
    $Newdivision = $_POST['Newdivision'];
    $Newcountry = $_POST['Newcountry'];
    $NewlocImage = $_POST['NewlocImage'];

    $sql = "UPDATE loc_info 
        SET loc_name = ?, 
            district = ?, 
            division = ?, 
            country = ?,             
            loc_image = ?
        WHERE loc_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $NewlocName, $Newdistrict, $Newdivision, 
    $Newcountry, $NewlocImage, $locId);

    
    if ($stmt->execute()) {
        
        $stmt->close();
        header("Location: locList.php");
        exit();
    } else {
 
        echo "Data update failed: " . $conn->error;
    }
} else {

    echo "Invalid request";
}


$conn->close();
?>
