<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Booking </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="body.css">
    <script src="calendar.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <img class="logo" src="logonobg.png" width="200" height="70" alt="logo">

        <nav>
            <ul class="nav_links">
                <li><a href="#">RESOURCES</a></li>
                <li><a href="#">DASHBOARD</a></li>
                <li><a href="#">CALENDAR</a></li>
            </ul>
        </nav>
        <a class="cta" href="#"><button>HOME</button></a>
    </header>
    <hr>
    <div class="container">
        <div class="right">
            <h2>Booking Details</h2>
            <form action="add_booking.php" method="post">
                <?php

            // Check if the session variable is set
            if (isset($_SESSION['email'])) {
                // If set, assign its value to the email input field
                $user_email = $_SESSION['email'];
                echo "<input type='email' name='email' placeholder='Enter your email' value='$user_email' readonly>";

            } else {
                // If not set, show a regular email input field
                echo "<input type='email' name='email' placeholder='Enter your email'>";
            }
            ?>
                <label for="purpose">Purpose:</label>
                <input type="text" name="purpose" placeholder="Enter your complaint">

                <label for="attendees">Number of Attendees:</label>
                <input type="number" name="attendees" placeholder="Enter your complaint">

                <label for="specialReq">Special Requirements:</label>
                <input type="text" name="specialReq" placeholder="Enter your complaint">

                <button type="submit" name="submit">Confirm Booking</button>
            </form>
            <?php if (isset($_SESSION['email'])) {
            // If set, show the inbox button
            echo "<a href='my_booking.php'><button>My booking</button></a>";
        }
        ?>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col">
                <img src="logonobg.png" class="logofoot">
                <p>"Welcome to Snapreserv! We provide a user-friendly platform that allows you to easily book various
                    resources such as meeting rooms, equipment, and facilities. Our system streamlines the booking
                    process, making it efficient and hassle-free. Whether you need to schedule a meeting, reserve
                    equipment, or book a venue for an event, our platform has you covered. Say goodbye to endless emails
                    and phone calls - with our system, booking resources has never been easier!"</p>
            </div>
            <div class="col">
                <h3>Office <div class="underline"><span></span></div>
                </h3>
                <p>SLIIT Malabe Campus</p>
                <p>New Kandy Road</p>
                <p>Malabe, Sri Lanka</p>
                <p class="email-id">snapreserv@gmail.com</p>
                <h4>+94 (70) 169 7047</h4>
            </div>

            <div class="col">
                <h3>Social Media<div class="underline"><span></span></h3>
                <div class="social-icons">
                    <i class='bx bxl-instagram'></i>
                    <i class='bx bxl-facebook-square'></i>
                    <i class='bx bxs-envelope'></i>
                    <i class='bx bxl-youtube'></i>
                    <i class='bx bxl-twitter'></i>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>

<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $purpose = $_POST['purpose'];
    $email = $_POST['email'];
    $attendees = $_POST['attendees'];
    $specialReq = $_POST['specialReq'];
    $query = "INSERT INTO booking (email, purpose, num_at, s_req) VALUES ('$email', '$purpose', '$attendees', '$specialReq')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $_SESSION['email'] = $email;
        echo "<script>window.location.href='add_booking.php'</script>"; // Corrected the redirection URL
    } else {
        echo "Failed to add booking";
    }
}