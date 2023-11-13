<?php

include ('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Hotel Booking</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "../bar.php" ?>


    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Hotel Booking Info</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Booking ID</td>
                        <td>Name</td>
                        <td>Hotel Name</td>
                        <td>Room Type</td>
                        <td>Check In</td>
                        <td>Check Out</td>
                        <td>Price</td>
                        <td>Payment</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $sql = "SELECT * FROM hotel_booking b join users_data u on (u.username = b.username) join hotel_info h on (h.hotel_id = b.hotel_id) ORDER BY booking_id DESC";


                    $result = mysqli_query($conn, $sql);


                    if ($result && mysqli_num_rows($result) > 0) {

                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['booking_id']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['hotel_name']; ?></td>
                                <td><?php echo $row['room_type']; ?></td>
                                <td><?php echo $row['checkin']; ?></td>
                                <td><?php echo $row['checkout']; ?></td>
                                <td>৳ <?php echo $row['total_price']; ?></td>
                                <td><?php echo $row['payment_status']; ?></td>
                                <?php if ($row['checkout'] >= date("Y-m-d")) { ?>

                                    <td> <p class="valid"> Valid </p></td>

                                <?php } else { ?>
                                    <td> <p  class="expire"> Expire </p></td>
                                <?php } ?>

                                <td>
                                    <div class="editdelbtn">
                                        <!-- Edit Button -->
                                        <button class="edit-button" onclick="editHotel(<?php echo $row['booking_id']; ?>)"><i class="fas fa-edit"></i></button>

                                        <!-- Delete Button -->
                                        <button class="delete-button" id="delbtn" onclick="confirmDelete(<?php echo $row['booking_id']; ?>)"> <i class="fas fa-trash-alt"></i></button>
                                        <div id="confirmDialog" style="display: none;">
                                            <div class="confirm-box">
                                                <div class="message-box">
                                                    <p id="confirmMessage">Are you sure you want to Delete?</p>
                                                    <div class="button-box">
                                                        <button id="confirmYes" class="yes-button">Yes</button>
                                                        <button id="confirmNo" class="no-button">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        <?php } ?>

                </tbody>
            </table>
        </div>
    <?php } ?>

    </div>
    <!-- Edit Hotel Modal -->
    <div id="editBookingModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Update Payment Status</h2>

            <form  action="edit_booking.php" method="post">

                <input type="hidden" name="booking_id" id="booking_id">

                <select name="payment" id="payment" required>
                    <option value="" disabled selected>--- Choose one option ---</option>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                </select>
                <br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>

    <script src="hotelBooking.js"></script>


</body>

</html>