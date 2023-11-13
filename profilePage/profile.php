<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <title>Profile</title>
</head>
<body>
    <?php include('../navbar.php'); ?>
    <div class="card">
        <div class="left-container">
            <img src="https://img.freepik.com/free-vector/mysterious-mafia-man-smoking-cigarette_52683-34828.jpg?w=740&t=st=1693683965~exp=1693684565~hmac=45f6e91d7bb18b0af36757b54dcc1ec20bf84969b186e45cf876d1c31b57635a" alt="Profile Image">
            <h2 class="gradienttext"><span class="fullname"><?php echo $fullname; ?></span></h2>
            <p><span id="usertype"><?php echo $usertype; ?></span></p>
        </div>
        <div class="right-container">
            <h3 class="gradienttext">Profile Details</h3>
            <table>
                <tr>
                    <td>Name :</td>
                    <td><span class="fullname"><?php echo $fullname; ?></span></td>
                </tr>
                <tr>
                    <td>User_Name :</td>
                    <td><span id="username"><?php echo $username; ?></span></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><span id="email"><?php echo $email; ?></span></td>
                </tr>
                <tr>
                    <td>Mobile :</td>
                    <td><span id="contact"><?php echo $contact; ?></span></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td>Uttara, Dhaka-1230</td>
                </tr>
            </table>
         
            <div class="button-container">
            <button id="updateProfileButton">Update Profile</button>
            </div>


        </div>
    </div>
    <?php include('../footer.php'); ?>
    <script>
    document.getElementById("updateProfileButton").addEventListener("click", function() {
        window.location.href = "updateProfile.php";
    });
</script>

</body>
</html>