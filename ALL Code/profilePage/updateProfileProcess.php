<?php
session_start();


include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION["username"];


$newFullname = $_POST['newFullname'];
$newEmail = $_POST['newEmail'];
$newContact = $_POST['newContact'];
$newPassword = $_POST['newPassword'];


if (!empty($newPassword)) {
    
    $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

  
    $updatePasswordSQL = "UPDATE users_data SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($updatePasswordSQL);
    $stmt->bind_param("ss", $newPasswordHashed, $username);
    $stmt->execute();
}


$updateUserInfoSQL = "UPDATE users_data SET fullname = ?, email = ?, contact = ? WHERE username = ?";
$stmt = $conn->prepare($updateUserInfoSQL);
$stmt->bind_param("ssss", $newFullname, $newEmail, $newContact, $username);
$stmt->execute();

$stmt->close();
$conn->close();


header("Location: profilePHP.php");
exit();
?>
