<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');

        /* CSS for navigation bar */
        body {
            font-family: 'Tilt Neon', sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            /* Fix the navigation bar at the top */
            top: 0;
            /* Place it at the top of the viewport */
            left: 0;
            /* Align it to the left */
            right: 0;
            /* Align it to the right */
            z-index: 100;
            /* Ensure it appears above other content */
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Style for the logo */
        .navbar a:first-child img {
            width: 50px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain the aspect ratio */
            margin-right: 5px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* CSS for login and register */
        .login-register {
            float: right;
        }
    </style>
</head>


<?php

if (isset($_SESSION['username'])) {
?>
    <div class="navbar">
        <div class="left">
            <!-- <a href="../index.php"><img src="https://t3.ftcdn.net/jpg/04/67/28/04/240_F_467280487_5naaaXM35KiZJz2l0d2BxLcImBLGbaOp.jpg" alt="Website Logo"></a> -->
            <a href="../index.php"><img src="https://i.ibb.co/L6TR05F/viper-logo-removebg-preview.png" style="width:70px;height:45px;" alt="Website Logo" width="1500" height="700"></a>
            <!-- <a href="../index.php"><label >Viper <br> Travels </label></a> -->
            <a href="../index.php"><i class="fas fa-home"></i> Home</a>
            <a href="../availablePlace/locList.php"><i class="fas fa-map-marked-alt"></i> Available Locations</a>
            <a href="../availableBus/busList.php"><i class="fas fa-bus"></i> Available Bus</a>
            <a href="#"><i class="fas fa-plane"></i> Available Plane</a>
            <a href="#"><i class="fas fa-train"></i> Available Train</a>
            <a href="../availableHotel/hotelList.php"><i class="fas fa-hotel"></i> Available Hotel</a>
        </div>
        <div class="login-register">
            <a href="../profilePage/profilePHP.php"><i class="fas fa-user"></i> Profile</a>
            <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> LogOUT</a>
        </div>
    </div>
<?php
} else { ?>
    <div class="navbar">
        <div class="left">
            <!-- <a href="../index.php"><img src="https://t3.ftcdn.net/jpg/04/67/28/04/240_F_467280487_5naaaXM35KiZJz2l0d2BxLcImBLGbaOp.jpg" alt="Website Logo"></a> -->
            <a href="../index.php"><img src="https://i.ibb.co/L6TR05F/viper-logo-removebg-preview.png" style="width:70px;height:45px;" alt="Website Logo"></a>
            <a href="../index.php"><i class="fas fa-home"></i> Home</a>
            <a href="../availablePlace/locList.php"><i class="fas fa-map-marked-alt"></i> Available Locations</a>
            <a href="../availableBus/busList.php"><i class="fas fa-bus"></i> Available Bus</a>
            <a href="#"><i class="fas fa-plane"></i> Available Plane</a>
            <a href="#"><i class="fas fa-train"></i> Available Train</a>
            <a href="../availableHotel/hotelList.php"><i class="fas fa-hotel"></i> Available Hotel</a>
        </div>
        <div class="login-register">
            <a href="../loginPage/login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
            <!-- <a href="../registerPage/register.php"><i class="fas fa-user-plus"></i> Register</a> -->
        </div>
    </div>
<?php }
?>

</br>
</br>