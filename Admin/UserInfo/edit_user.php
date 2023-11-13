<?php

include ('../connect.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'];
    $userType = $_POST['usertype'];

  
    $sql = "UPDATE users_data SET usertype = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("ss", $userType, $userName);

    if ($stmt->execute()) {
        // echo "Record updated successfully";
    
        header("Location: userInfo.php");
        exit();
    } else {
        echo "Data update failed: " . $stmt->error;
    }

    $stmt->close();
} else {

    echo "Invalid request";
}


$conn->close();
?>
