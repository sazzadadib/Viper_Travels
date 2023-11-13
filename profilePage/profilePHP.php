<?php
session_start();

include ('../connect.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION["username"];

$sql = "SELECT fullname, username, email, contact, usertype FROM users_data WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        $fullname = $row["fullname"];
        $username = $row["username"];
        $email = $row["email"];
        $contact = $row["contact"];
        $usertype = $row["usertype"];
        $_SESSION['usertype'] = $usertype;
        
    }
} else {
    echo "No user data found.";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
    <?php include 'profile.php'; ?>
</body>
</html>
