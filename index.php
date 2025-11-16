<?php include "header.php"; ?>

<?php
$student_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM students"))[0];
$faculty_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM faculty"))[0];
$course_count  = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM courses"))[0];
$room_count    = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM rooms"))[0];
?>

<h2 class="fw-bold mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h2>

<div class="row mb-5 g-4">
    <div class="col-md-3">
        <div class="dashboard-card p-4 text-center bg-white rounded">
            <i class="bi bi-people-fill fs-1 text-primary"></i>
            <h3 class="fw-bold mt-2"><?= $student_count; ?></h3>
            <p class="text-secondary fw-semibold">Students</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dashboard-card p-4 text-center bg-white rounded">
            <i class="bi bi-person-badge fs-1 text-success"></i>
            <h3 class="fw-bold mt-2"><?= $faculty_count; ?></h3>
            <p class="text-secondary fw-semibold">Faculty</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dashboard-card p-4 text-center bg-white rounded">
            <i class="bi bi-journal fs-1 text-danger"></i>
            <h3 class="fw-bold mt-2"><?= $course_count; ?></h3>
            <p class="text-secondary fw-semibold">Courses</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dashboard-card p-4 text-center bg-white rounded">
            <i class="bi bi-building fs-1 text-warning"></i>
            <h3 class="fw-bold mt-2"><?= $room_count; ?></h3>
            <p class="text-secondary fw-semibold">Rooms</p>
        </div>
    </div>
</div>

<h3 class="fw-bold mb-3"><i class="bi bi-grid-3x3-gap"></i> Modules</h3>
<div class="d-flex flex-wrap">

    <a class="btn btn-primary module-btn m-2" href="students/list.php"><i class="bi bi-people"></i> Students</a>
    <a class="btn btn-primary module-btn m-2" href="faculty/list.php"><i class="bi bi-person-badge"></i> Faculty</a>
    <a class="btn btn-primary module-btn m-2" href="courses/list.php"><i class="bi bi-journal"></i> Courses</a>
    <a class="btn btn-primary module-btn m-2" href="timetable/list.php"><i class="bi bi-calendar-week"></i> Timetable</a>
    <a class="btn btn-primary module-btn m-2" href="attendance/list.php"><i class="bi bi-clipboard-check"></i> Attendance</a>
    <a class="btn btn-primary module-btn m-2" href="exams/list.php"><i class="bi bi-file-earmark-bar-graph"></i> Exams</a>
    <a class="btn btn-primary module-btn m-2" href="exam_results/list.php"><i class="bi bi-clipboard-data"></i> Exam Results</a>
    <a class="btn btn-primary module-btn m-2" href="room_booking/list.php"><i class="bi bi-door-open"></i> Room Booking</a>
    <a class="btn btn-primary module-btn m-2" href="reports/index.php"><i class="bi bi-graph-up-arrow"></i> Reports</a>

</div>

<?php include "footer.php"; ?>
