<?php
// Include database connection
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get form data
    $booking_id = $_POST['booking_id'];
    $purpose = $_POST['purpose'];
    $attendees = $_POST['attendees'];
    $specialReq = $_POST['specialReq'];

    // Update booking record in the database
    $query = "UPDATE booking SET purpose = '$purpose', num_at = '$attendees', s_req = '$specialReq' WHERE b_id = '$booking_id'";

    // Execute the update query
    if (mysqli_query($connect, $query)) {
        // Redirect to booking list page after successful update
        header("Location: my_booking.php");
        exit(); // Exit immediately after sending the redirection header
    } else {
        // Display error message if update fails
        echo "Error updating booking: " . mysqli_error($connect);
    }
} else {
    // Redirect to booking list page if form data is not submitted properly
    header("Location: my_booking.php");
    exit(); // Exit immediately after sending the redirection header
}

// Close database connection
mysqli_close($connect);
?>