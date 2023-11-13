<?php
session_start();

$inputJSON = file_get_contents('php://input');

$data = json_decode($inputJSON, true);

if (isset($data['selectedSeats'])) {

    include ('../connect.php');

    
   
    if ($conn->connect_error) {
        $response = array('success' => false, 'message' => 'Database connection failed');
        echo json_encode($response);
        exit();
    }

    
    if (!isset($_SESSION['username'])) {
        $response = array('success' => false, 'message' => 'User is not logged in');
        echo json_encode($response);
        exit();
    }

    $selectedSeats = $data['selectedSeats'];

  
    if (empty($selectedSeats)) {
        $response = array('success' => false, 'message' => 'No seats selected');
        echo json_encode($response);
        exit();
    }

  
    $username = $_SESSION['username'];
    $date = $_SESSION['date'];
    if (isset($_SESSION['selected_bus_id'])) {
        $bus_id = $_SESSION['selected_bus_id'];
        $bus_fare = $_SESSION['bus_fare'];
    } else {
        $response = array('success' => false, 'message' => 'Bus ID not found in session');
        echo json_encode($response);
        exit();
    }
    
   
    $bookingSuccess = true;

    
   
    $sql = "INSERT INTO bus_booking (username, bus_id, seat_number, booking_date, fare) VALUES (?, ?, ?, ?, ? )";
    
  
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
       
        foreach ($selectedSeats as $seat_number) {
       
             $checkSql = "SELECT * FROM bus_booking WHERE bus_id = ? AND seat_number = ? AND booking_date = ?";
             $checkStmt = $conn->prepare($checkSql);
             $checkStmt->bind_param("iss", $bus_id, $seat_number, $date);
             $checkStmt->execute();
             $result = $checkStmt->get_result();
             
             if ($result->num_rows > 0) {
                 $bookingSuccess = false;
                 $response = array('success' => false, 'message' => 'Seat already Booked!');
                 echo json_encode($response);
                 exit();
             }
             
           
            $stmt->bind_param("sissi", $username, $bus_id, $seat_number,$date, $bus_fare);
            
          
            if (!$stmt->execute()) {
                $bookingSuccess = false;
                break; 
            }
        }
        
       
        $stmt->close();
    } else {
        $bookingSuccess = false;
    }
    
    
    $conn->close();
    

    if ($bookingSuccess) {
        $response = array('success' => true, 'message' => 'Seats booked successfully');
    } else {
        $response = array('success' => false, 'message' => 'Booking failed');
    }
    
    
    echo json_encode($response);
} else {
    
    $response = ['success' => false, 'message' => 'No seats data received'];
    echo json_encode($response);
}
?>
