<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
</head>

<body>
    <div class="container">
        <h2>Edit Booking</h2>

        <?php
        // Include database connection
        include_once 'connect.php';

        // Check if booking ID is provided in the URL
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            // Get the booking ID from the URL
            $booking_id = $_GET['id'];

            // Fetch booking details from the database based on the booking ID
            $query = "SELECT * FROM booking WHERE b_id = '$booking_id'";
            $result = mysqli_query($connect, $query);

            // Check if booking details are found
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
        <!-- Display the edit form -->
        <form action="update_booking.php" method="POST">
            <input type="hidden" name="booking_id" value="<?php echo $row['b_id']; ?>">

            <label for="purpose">Purpose:</label>
            <input type="text" id="purpose" name="purpose" value="<?php echo $row['purpose']; ?>" required>

            <label for="attendees">Number of Attendees:</label>
            <input type="number" id="attendees" name="attendees" value="<?php echo $row['num_at']; ?>" required>

            <label for="specialReq">Special Requirements:</label>
            <textarea id="specialReq" name="specialReq" rows="4" cols="50"
                required><?php echo $row['s_req']; ?></textarea>

            <input type="submit" name="update" value="Update">
        </form>
        <?php
            } else {
                echo "Booking not found.";
            }
        } else {
            echo "Invalid request. Please provide a valid booking ID.";
        }

        // Close database connection
        mysqli_close($connect);
        ?>
    </div>
</body>

</html>