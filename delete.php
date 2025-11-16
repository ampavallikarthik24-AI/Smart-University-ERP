<?php
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM timetable WHERE tt_id = $id");
header("Location: list.php");
?>
