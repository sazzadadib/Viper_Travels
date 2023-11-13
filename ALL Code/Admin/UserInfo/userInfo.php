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
                <h2>User Info</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Usertype</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $sql = "SELECT * FROM users_data";


                    $result = mysqli_query($conn, $sql);


                    if ($result && mysqli_num_rows($result) > 0) {

                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['contact']; ?></td>
                                <?php if ($row['usertype'] == 'user') { ?>

                                    <td> <p class="valid"> <?php echo $row['usertype']; ?> </p></td>

                                <?php } else { ?>
                                    <td> <p  class="expire"> <?php echo $row['usertype']; ?> </p></td>
                                <?php } ?>

                                <td>
                                    <div class="editdelbtn">
                                        <!-- Edit Button -->
                                        <button class="edit-button" onclick="editUser('<?php echo $row['username']; ?>')"><i class="fas fa-edit"></i></button>

                                        <!-- Delete Button -->
                                        <button class="delete-button" id="delbtn" onclick="confirmDelete('<?php echo $row['username']; ?>')"> <i class="fas fa-trash-alt"></i></button>
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
    <div id="edituserModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Update User Type</h2>

            <form  action="edit_user.php" method="post">

                <input type="hidden" name="username" id="username">

                <select name="usertype" id="payment" required>
                    <option value="" disabled selected>--- Choose one option ---</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>

    <script src="userInfo.js"></script>


</body>

</html>