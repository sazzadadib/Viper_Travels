<?php
session_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Details</title>
    <link rel="stylesheet" href="afterBookingstyle.css">

<body>
<?php  include('../navbar.php');  ?>
<br><br><br>
    <?php
    include ('../connect.php');


    $hotel_id = $_SESSION['hotel_id'];

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT DISTINCT * FROM hotel_info WHERE `hotel_id` = ?";
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("i", $hotel_id);

 
    $stmt->execute();

  
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $sql2 = "SELECT booking_id FROM hotel_booking ORDER BY booking_id DESC LIMIT 1";

 
    $result2 = mysqli_query($conn, $sql2);

   
    if ($result2 && mysqli_num_rows($result2) > 0) {
        
        $row2 = mysqli_fetch_assoc($result2);
        $latestBookingId = $row2['booking_id'];
    }



    ?>
    
    <div class="confirmation-container">
    <button id="printButton" onclick="window.print()">Print as PDF</button>
        <h1>Booking Details</h1>
        <div class="booking-details">
            <p class="bookingID">Booking Reference: <span class="booking-reference"><?php echo $latestBookingId; ?></span></p>
            <div class="hotelname">
                <p class="hotel">Stay at <?php echo $row['hotel_name']; ?></p>
                <div class="namedate">
                    <figure>
                        <img src="<?php echo $_SESSION['room_image']; ?>" alt="">
                    </figure>
                    <div class="titledate">
                        <div class="stay-details">

                            <p class="name"><?php echo $_SESSION['type_name']; ?></p>
                            <p class="guest">Guests:<br> <?php echo $_SESSION['guests']; ?> x Adult</p>
                        </div>
                        <div class="dates">
                            <p>Dates:</p>
                            <p>Check In: <?php echo $_SESSION['checkin']; ?></p>
                            <p>Check Out: <?php echo $_SESSION['checkout']; ?></p>
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
                                        <td>Total Room:</td>
                                        <td>Total Night:</td>
                                        <td>Taxes:</td>
                                    </tr>
                                    <tr>
                                        <td>৳ <?php echo $_SESSION['room_price']; ?></p>
                                        </td>
                                        <td><?php echo $_SESSION['totalroom']; ?></td>
                                        <td><?php echo $_SESSION['totalday']; ?></td>
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
                    <p>Total Amount: ৳<?php echo $_SESSION['totalpriceroom']; ?></p>
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