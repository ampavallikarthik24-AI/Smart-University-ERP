<?php
include "../config.php";

$id = $_POST['id'];
$marks = $_POST['marks'];

mysqli_query($conn, "
    UPDATE exam_results
    SET marks_obtained = '$marks'
    WHERE result_id = $id
");

echo "<script>alert('Result updated successfully!');window.location='list.php';</script>";
?>
