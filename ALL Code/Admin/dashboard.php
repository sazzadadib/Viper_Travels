<?php

include('../connect.php');

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
    <title>Admin Panel | Viper Travels</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/logo.png" alt="">
                        </span>
                        <span class="sitetitle">Viper Travels</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="UserInfo/userInfo.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="Location/locList.php">
                        <span class="icon">
                            <ion-icon name="location-outline"></ion-icon>
                        </span>
                        <span class="title">Location</span>
                    </a>
                </li>
                <li>
                    <a href="Bus/busList.php">
                        <span class="icon">
                            <ion-icon name="bus-outline"></ion-icon>
                        </span>
                        <span class="title">Bus</span>
                    </a>
                </li>
                <li>
                    <a href="Hotel/hotelList.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">Hotel</span>
                    </a>
                </li>

                <li>
                    <a href="BusBooking/busBooking.php">
                        <span class="imgicon">
                            <div class="imgBox">
                                <img src="assets/imgs/bus_booking.png" alt="">
                            </div>
                        </span>
                        <span class="title">Bus Booking</span>
                    </a>
                </li>

                <li>
                    <a href="HotelBooking/hotelBooking.php">
                        <span class="imgicon">
                            <div class="imgBox">
                                <img src="assets/imgs/hotel_booking.png" alt="">
                            </div>
                        </span>

                        <span class="title">Hotel Booking</span>

                    </a>
                </li>

                <!-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li> -->

                <li>
                    <a href="../logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline" style="color: white;"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/logo.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <?php
                $sqluser = "SELECT count(*) as total FROM users_data";
                $resultuser = $conn->query($sqluser);
                if ($resultuser->num_rows > 0) {
                    $rowuser = $resultuser->fetch_assoc();
                    $totaluser = $rowuser['total'];
                ?>
                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totaluser; ?>">00</div>
                            <div class="cardName">Total User</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $sqlloc = "SELECT count(*) as total FROM loc_info";
                $resultloc = $conn->query($sqlloc);
                if ($resultloc->num_rows > 0) {
                    $rowloc = $resultloc->fetch_assoc();
                    $totalloc = $rowloc['total'];
                ?>

                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totalloc; ?>">00</div>
                            <div class="cardName">Total Loaction</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="location-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $sqlbus = "SELECT count(*) as total FROM bus_info";
                $resultbus = $conn->query($sqlbus);
                if ($resultbus->num_rows > 0) {
                    $rowbus = $resultbus->fetch_assoc();
                    $totalbus = $rowbus['total'];
                ?>

                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totalbus; ?>">00</div>
                            <div class="cardName">Total BUS</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="bus-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $sqlhotel = "SELECT count(*) as total FROM hotel_info";
                $resulthotel = $conn->query($sqlhotel);
                if ($resulthotel->num_rows > 0) {
                    $rowhotel = $resulthotel->fetch_assoc();
                    $totalhotel = $rowhotel['total'];
                ?>

                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totalhotel; ?>">00</div>
                            <div class="cardName">Total Hotel</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="hotel-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>



                <?php
                $sqlbusbook = "SELECT count(*) as total FROM bus_booking";
                $resultbusbook = $conn->query($sqlbusbook);
                if ($resultbusbook->num_rows > 0) {
                    $rowbusbook = $resultbusbook->fetch_assoc();
                    $totalbusbook = $rowbusbook['total'];
                ?>

                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totalbusbook; ?>"></div>
                            <div class="cardName">Total Bus Booking</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="room-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $sqlhotelbook = "SELECT count(*) as total FROM hotel_booking";
                $resulthotelbook = $conn->query($sqlhotelbook);
                if ($resulthotelbook->num_rows > 0) {
                    $rowhotelbook = $resulthotelbook->fetch_assoc();
                    $totalhotelbook = $rowhotelbook['total'];
                ?>

                    <div class="card">
                        <div>
                            <div class="numbers" data-val="<?php echo $totalhotelbook; ?>">00</div>
                            <div class="cardName">Total Hotel Booking</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="bed-outline"></ion-icon>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- ================ Order Details List ================= -->

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Bus Booking Info</h2>
                        <a href="BusBooking/busBooking.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Booking ID</td>
                                <td>Name</td>
                                <td>Bus Name</td>
                                <td>Seat Number</td>
                                <td>Price</td>
                                <td>Payment</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $sql = "SELECT * FROM bus_booking b join users_data u on (u.username = b.username) join bus_info bus on (bus.bus_id = b.bus_id) ORDER BY booking_id DESC LIMIT 10";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['booking_id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['bus_name']; ?></td>
                                        <td><?php echo $row['seat_number']; ?></td>
                                        <td>৳ <?php echo $row['fare']; ?></td>

                                        <?php if ($row['payment_status'] == 'Paid') { ?>

                                            <td>
                                                <p class="paid"> Paid </p>
                                            </td>

                                        <?php } else { ?>
                                            <td>
                                                <p class="unpaid"> Unpaid </p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <!-- ================= New Customers ================ -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                    <a href="UserInfo/userInfo.php" class="btn">View All</a>
                </div>


                <table>
                    <?php
                    $sql3 = "SELECT * FROM users_data u  LIMIT 10";
                    // Execute the query
                    $result3 = mysqli_query($conn, $sql3);


                    if ($result3 && mysqli_num_rows($result3) > 0) {

                        while ($row3 = $result3->fetch_assoc()) {
                    ?>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h4><?php echo $row3['fullname']; ?> <br> <span><?php echo $row3['username']; ?></span></h4>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </table>
            </div>
            </div>
            <div class="details2">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Hotel Booking</h2>
                        <a href="HotelBooking/hotelBooking.php" class="btn">View All</a>
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
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $sql = "SELECT * FROM hotel_booking b join users_data u on (u.username = b.username) join hotel_info h on (h.hotel_id = b.hotel_id) ORDER BY booking_id DESC LIMIT 10";


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
                                        <?php if ($row['payment_status'] == 'Paid') { ?>

                                            <td>
                                                <p class="paid"> Paid </p>
                                            </td>

                                        <?php } else { ?>
                                            <td>
                                                <p class="unpaid"> Unpaid </p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>