<?php
session_start();

$user = $_SESSION['username'];
$date = $_SESSION['date'];
$bus_id = $_SESSION['selected_bus_id'];
$bus_fare = $_SESSION['bus_fare'];
$counter = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="busBookingDetails.css">
</head>

<body>
    <?php include('../navbar.php');  ?>
    
    <?php
    include ('../connect.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT DISTINCT * FROM bus_info WHERE `bus_id` = ?";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("i", $bus_id);


    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $sql2 = "SELECT * FROM bus_booking WHERE `bus_id` = ? and `username` = ? and `booking_date` = ?";
    $stmt2 = $conn->prepare($sql2);

 
    $stmt2->bind_param("iss", $bus_id, $user, $date);


    $stmt2->execute();


    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $seatNumbers[] = $row2['seat_number'];
            $counter++;
        }
    } else {
        $seatsnumber = 200;
    }

    ?>


    <div class="confirmation-container">
        <button id="printButton" onclick="window.print()">Print as PDF</button>
        <h1>Booking Details</h1>
        <div class="booking-details">
            <div class="hotelname">
                <p class="hotel">Travel with <?php echo $row['bus_name']; ?></p>
                <div class="namedate">
                    <figure>
                        <img src="<?php echo $row['bus_image']; ?>" alt="">
                    </figure>
                    <div class="titledate">
                        <div class="stay-details">
                            <p class="name"><?php echo $row['bus_name']; ?></p>
                            <p class="guest">From: <?php echo $_SESSION['from']; ?> </p>
                            <p class="guest">To: <?php echo $_SESSION['to']; ?> </p>
                            <p class="guest">Date: <?php echo $_SESSION['date']; ?> </p>

                        </div>
                        <div class="dates">
                            
                        </div>
                    </div>
                </div>
                <div class="plan-information">
                    <table>
                        <tr>
                            <td>Price Information</td>
                        </tr>
                        <tr>
                            <td>
                                <table class="sub-table">
                                    <tr>
                                        <td>Base Price:</td>
                                        <td>Seats Number:</td>
                                        <td>Taxes:</td>
                                    </tr>
                                    <tr>
                                        <td>৳ <?php echo $bus_fare; ?></td>
                                        <td><?php foreach ($seatNumbers as $seatNumber) {
                                                echo  $seatNumber . ",";
                                            } ?></td>
                                        <td>0.00</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="totalamount">
                <div class="total">
                    <p>Total Amount: ৳<?php echo $bus_fare * $counter; ?></p>
                </div>
            </div>
            <p class="avaipayment"><u> Available Payment Option </u></p>
            <div class="card-row">
                <span class="visa"></span>
                <span class="mastercard"></span>
                <span class="amex"></span>
                <span class="bkash"></span>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>

</html>