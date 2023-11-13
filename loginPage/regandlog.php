<?php
session_start();
include ('../connect.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['signup-btn'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
    $sql = "INSERT INTO users_data (fullname, username, email, password, contact, usertype) VALUES ('$name', '$username', '$email', '$hashed_password', '$contact' , 'user')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: login.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['signin-btn'])) {
    $signin_username = $_POST['signin-username'];
    $signin_password = $_POST['signin-password'];

    // Check the database for the username
    $sql = "SELECT * FROM users_data WHERE username='$signin_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($signin_password, $row['password'])) {
            $_SESSION['username'] = $signin_username;
            $_SESSION['usertype'] = $row['usertype'];
            if (isset($_SESSION['redirect_url'])) {
                header("Location: " . $_SESSION['redirect_url']);
            } else {
                if($row['usertype'] == 'admin'){
                    header("Location: ../Admin/dashboard.php");
                }else{
                    header("Location: ../profilePage/profilePHP.php");
                }
            }
            exit();
        } else {
            echo '<script>
        alert("Incorrect username or password. Please try again.");
        window.location.href = "login.php";
    </script>';
            exit;
        }
    } else {
        echo '<script>
        alert("User not found. Please register.");
        window.location.href = "login.php";
    </script>';
        exit;
    }
}
