<?php
include ('../connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $locName = $_POST["locName"];
    $district = $_POST["district"];
    $division = $_POST["division"];
    $country = $_POST["country"];
    $locImage = $_POST["locImage"];

  
    $sql = "INSERT INTO loc_info (loc_name, district, division, country, loc_image)
            VALUES ('$locName', '$district', '$division', '$country','$locImage')";

    if ($conn->query($sql) === TRUE) {
     
        header("location: locList.php");
    } else {
    
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
