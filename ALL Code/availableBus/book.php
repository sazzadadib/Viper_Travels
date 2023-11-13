<?php
session_start();

if (!isset($_SESSION['username'])) {
    
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

    header("Location: ../loginPage/login.php");
    exit();
}
include ('../connect.php');

$date = $_SESSION['date'];




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['bus_id'])) {
    $bus_id = $_GET['bus_id'];
    $_SESSION['selected_bus_id'] = $bus_id;


    $sql = "SELECT * FROM bus_info WHERE bus_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bus_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $bus_data = $result->fetch_assoc();
            $_SESSION['bus_fare'] = $bus_data['bus_fare'];
        } else {
            echo "Bus not found.";
            exit();
        }
    } else {
        echo "Error executing query: " . $stmt->error;
        exit();
    }

    $sql2 = "SELECT seat_number FROM bus_booking WHERE bus_id = '$bus_id' AND booking_date = '$date'";
    $result2 = $conn->query($sql2);
    $bookedSeats = array();

    if ($result2->num_rows > 0) {

        while ($row2 = $result2->fetch_assoc()) {
            $bookedSeats[] = $row2['seat_number'];
        }
    }
} else {
    echo "Bus ID not provided in the URL.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="bookstyles.css">
</head>

<body>
    <?php include('../navbar.php'); ?>
    <h1>Bus Details</h1>
    <table>
        <tr>
            <td>Bus ID:</td>
            <td><?php echo $bus_data['bus_id']; ?></td>
        </tr>
        <tr>
            <td>Bus Name:</td>
            <td><?php echo $bus_data['bus_name']; ?></td>
        </tr>
        <tr>
            <td>Starting Point:</td>
            <td><?php echo $bus_data['starting_point']; ?></td>
        </tr>
        <tr>
            <td>Ending Point:</td>
            <td><?php echo $bus_data['ending_point']; ?></td>
        </tr>
        <tr>
            <td>Booking Date:</td>
            <td><?php echo $date; ?></td>
        </tr>
        <tr>
            <td>Bus Fare:</td>
            <td><?php echo $bus_data['bus_fare']; ?></td>
        </tr>
    </table>

    <h2>Seat Selection</h2>
    <div class="container">
        <div class="innnercontainer">
            <div class="leftside">
            </div>
            <div class="rightside">
                <img id="bus_steering" src="images/steering.png" alt="">
                <br>
            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="1">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="2">
                <img src="images/seat.png" alt="" value="3">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="4">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="5">
                <img src="images/seat.png" alt="" value="6">
            </div>
        </div>

        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="7">
            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="8">
                <img src="images/seat.png" alt="" value="9">
            </div>
        </div>

        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="10">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="11">
                <img src="images/seat.png" alt="" value="12">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="13">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="14">
                <img src="images/seat.png" alt="" value="15">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="16">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="17">
                <img src="images/seat.png" alt="" value="18">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="19">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="20">
                <img src="images/seat.png" alt="" value="21">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="22">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="23">
                <img src="images/seat.png" alt="" value="24">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="25">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="26">
                <img src="images/seat.png" alt="" value="27">

            </div>
        </div>
        <div class="innnercontainer">
            <div class="leftside">
                <img src="images/seat.png" alt="" value="28">


            </div>
            <div class="rightside">
                <img src="images/seat.png" alt="" value="29">
                <img src="images/seat.png" alt="" value="30">

            </div>
        </div>
        <br>
        <button id="book-button">Book Selected Seats</button>
        <br>
        <br>
    </div>

    <script>
        const seatImagesLeft = document.querySelectorAll('.innnercontainer .leftside img');
        const seatImagesRight = document.querySelectorAll('.innnercontainer .rightside img');
        const allSeatImages = [...seatImagesLeft, ...seatImagesRight]; 
        const busSteering = document.getElementById('bus_steering');


        const bookedSeats = <?php echo json_encode($bookedSeats); ?>;
        let selectedSeats = [];

        const busId = <?php echo $bus_id; ?>;

        allSeatImages.forEach(function(seat) {
            const seatNumber = seat.getAttribute('value');

            if (bookedSeats.includes(seatNumber)) {
                seat.setAttribute('src', 'images/redseat.png');
                seat.setAttribute('data-booked', 'true');
            }
            seat.addEventListener('mouseover', function() {

                const seatNumber = seat.getAttribute('value');

                seat.title = `${seatNumber}`;

            });

            seat.addEventListener('click', function() {
                if (seat.getAttribute('data-booked') !== 'true') {
                    if (selectedSeats.includes(seatNumber)) {
                
                        seat.setAttribute('src', 'images/seat.png');
                        const index = selectedSeats.indexOf(seatNumber);
                        if (index !== -1) {
                            selectedSeats.splice(index, 1);
                        }
                    } else if (selectedSeats.length < 5) {
                        
                        seat.setAttribute('src', 'images/greenseat.png');
                        selectedSeats.push(seatNumber);
                    }
                }
            });
        });

       
        busSteering.addEventListener('click', function() {
            busSteering.setAttribute('src', 'images/steering.png');
        });


        const bookButton = document.getElementById('book-button');
        bookButton.addEventListener('click', function() {
            if (selectedSeats.length > 0) {
                
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process_booking.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        if (confirm('Seats booked successfully! Do you want to book a hotel?')) {
                            window.location.href = '../availableHotel/afterBusBook.php';
                        } else {
                            window.location.href = 'busBookingDetails.php';
                        }
                    } else {
                        alert('Error booking seats. Please try again later.');
                    }
                };
                xhr.onerror = function() {
                    alert('Request failed. Please try again later.');
                };

                xhr.send(`bus_id=${busId}&seat_numbers=${JSON.stringify(selectedSeats)}`);

            } else {
                alert('Please select at least one seat to book.');
            }
        });
    </script>
</body>

</html>