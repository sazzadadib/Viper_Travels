<?php

include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $busName = $_POST["busName"];
    $startingPoint = $_POST["startingPoint"];
    $endingPoint = $_POST["endingPoint"];
    $departureTime = $_POST["departureTime"];
    $reachedTime = $_POST["reachedTime"];
    $busFare = $_POST["busFare"];
    $busImage = $_POST["busImage"];

    $sql = "INSERT INTO bus_info (bus_name, starting_point, ending_point, departure_time, reached_time, bus_fare,bus_image)
            VALUES ('$busName', '$startingPoint', '$endingPoint', '$departureTime', '$reachedTime', '$busFare','$busImage')";

    if ($conn->query($sql) === TRUE) {
        header("location: busList.php");
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
