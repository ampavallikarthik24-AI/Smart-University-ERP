<?php
include "../config.php";

$faculty_id = $_POST['faculty_id'];
$room_id = $_POST['room_id'];
$date = $_POST['date'];
$purpose = $_POST['purpose'];

$check = mysqli_query($conn,"
    SELECT * FROM room_booking_log
    WHERE room_id = $room_id AND date = '$date'
");

if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Room already booked on this date!');window.location='add.php';</script>";
    exit;
}

mysqli_query($conn,"
    INSERT INTO room_booking_log(faculty_id, room_id, date, purpose, created_at)
    VALUES($faculty_id, $room_id, '$date', '$purpose', NOW())
");

echo "<script>alert('Room booked successfully!');window.location='list.php';</script>";
?>
