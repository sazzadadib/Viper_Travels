<?php
session_start();

include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION['username'];
$hotel_id = $_SESSION['hotel_id'];
$type_name = $_SESSION['type_name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkIn = $_POST["check_in"];
    $checkOut = $_POST["check_out"];
    $adults = $_POST["adults"];
    $quantity = $_POST["quantity"];   

    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);
    $interval = $checkInDate->diff($checkOutDate);
    $numberOfDays = $interval->days;

    $total_price = $_SESSION['room_price'] * $quantity * $numberOfDays;


    $_SESSION['checkin'] = $checkIn;
    $_SESSION['checkout'] = $checkOut;
    $_SESSION['guests'] = $adults;
    $_SESSION['totalroom'] = $quantity;
    $_SESSION['totalday'] = $numberOfDays;
    $_SESSION['totalpriceroom'] = $total_price;




    $sql = "INSERT INTO hotel_booking (username, hotel_id, room_type, checkin, checkout, adults, quantity, total_price) 
                VALUES (?, ?, ?, ?, ? , ? , ? , ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssiii", $username, $hotel_id, $type_name, $checkIn, $checkOut, $adults, $quantity, $total_price);


    if ($stmt->execute()) {
  
        echo "<html>
                <head>
                    <style>
                        /* Styles for the pop-up container */
                        .popup {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.5);
                            z-index: 999;
                        }
    
                        /* Styles for the pop-up content */
                        .popup-content {
                            background-color: white;
                            padding: 20px;
                            border-radius: 5px;
                            text-align: center;
                        }
                    </style>
                </head>
                <body>
                    <div class='popup'>
                        <div class='popup-content'>
                            <h1>Booking successful! Thank you for using Viper Tarvels.</h1>
                        </div>
                    </div>
                    <script>
                        setTimeout(function() {
                            document.querySelector('.popup').style.display = 'none';
                            window.location.href = 'afterBooking.php'; 
                        }, 3000); 
                    </script>
                </body>
              </html>";
    } else {

        echo "Booking failed. Please try again later or contact customer support.";
    }


    $stmt->close();
    $conn->close();
} else {

    echo "Please fix the following errors:<br>";
    foreach ($errors as $error) {
        echo "- $error<br>";
    }
}
