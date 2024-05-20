<?php
// Include database connection
include_once 'connect.php';

// Check if the booking ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the booking ID from the URL
    $booking_id = $_GET['id'];

    // Construct the SQL query to delete the booking
    $query = "DELETE FROM booking WHERE b_id = '$booking_id'";

    // Execute the delete query
    if (mysqli_query($connect, $query)) {
        // Redirect to booking list page after successful deletion
        header("Location: my_booking.php");
        exit(); // Exit immediately after sending the redirection header
    } else {
        // Display error message if deletion fails
        echo "Error deleting booking: " . mysqli_error($connect);
    }
} else {
    // Redirect to booking list page if booking ID is not provided in the URL
    header("Location: my_booking.php");
    exit(); // Exit immediately after sending the redirection header
}

// Close database connection
mysqli_close($connect);
?>