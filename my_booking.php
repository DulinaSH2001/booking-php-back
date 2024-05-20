<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
</head>
<style>
/* Add border to table */
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}
</style>

<body>
    <div class="container">
        <h2>All Bookings</h2>
        <table>
            <thead>
                <tr>

                    <th>Purpose</th>
                    <th>Number of Attendees</th>
                    <th>Special Requirements</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Start the session
                session_start();

                include 'connect.php';

                if (!isset($_SESSION['email'])) {
                    header("Location: login.php");
                    exit();
                } else {
                    echo "<h2>Welcome " . $_SESSION['email'] . "</h2>";

                    $user_email = $_SESSION['email'];

                    $query = "SELECT * FROM booking WHERE email = '$user_email'";
                    $result = mysqli_query($connect, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                           
                            echo "<td>" . $row['purpose'] . "</td>";
                            echo "<td>" . $row['num_at'] . "</td>";
                            echo "<td>" . $row['s_req'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_booking.php?id=" . $row['b_id'] . "'>Edit</a> | ";
                            echo "<a href='delete_booking.php?id=" . $row['b_id'] . "'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No bookings found for this user.</td></tr>";
                    }

                    mysqli_close($connect);
                }
                ?>
            </tbody>
        </table>
        <a href="add_booking.php">Add Booking</a>
    </div>
</body>

</html>