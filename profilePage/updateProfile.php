<?php
session_start();

include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION["username"];
$sql = "SELECT fullname, email, password, contact FROM users_data WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fullname = $row["fullname"];
        $email = $row["email"];
        $contact = $row["contact"];
    }
} else {
    echo "No user data found.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Update Profile Info</title>
</head>
<body>
<?php
    if (isset($_SESSION['username']))
    include('../navbar.php');
    ?>
        
    <div class="content">
    <h2><?php echo $_SESSION['username'] ?>, Update Your Profile</h2>
    <form action="updateProfileProcess.php" method="POST">
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="newFullname" value="<?php echo isset($fullname) ? $fullname : ''; ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="newEmail" value="<?php echo isset($email) ? $email : ''; ?>"></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><input type="text" name="newContact" value="<?php echo isset($contact) ? $contact : ''; ?>"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="newPassword"></td>
            </tr>
        </table>
        <input type="submit" value="Save Changes">
    </form>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
