<?php include "../header.php"; ?>

<?php
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM timetable WHERE tt_id = $id"));
?>

<h2 class="fw-bold mb-4"><i class="bi bi-pencil-square"></i> Edit Timetable Entry</h2>

<form method="POST" class="w-50">

    <label class="fw-semibold">Course</label>
    <select class="form-control mb-3" name="course_id" required>
        <?php
        $courses = mysqli_query($conn, "SELECT * FROM courses");
        while ($c = mysqli_fetch_assoc($courses)) {
            $sel = ($c['course_id'] == $row['course_id']) ? "selected" : "";
            echo "<option value='{$c['course_id']}' $sel>{$c['course_name']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Faculty</label>
    <select class="form-control mb-3" name="faculty_id" required>
        <?php
        $faculty = mysqli_query($conn, "SELECT * FROM faculty");
        while ($f = mysqli_fetch_assoc($faculty)) {
            $sel = ($f['faculty_id'] == $row['faculty_id']) ? "selected" : "";
            echo "<option value='{$f['faculty_id']}' $sel>{$f['faculty_name']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Room</label>
    <select class="form-control mb-3" name="room_id" required>
        <?php
        $rooms = mysqli_query($conn, "SELECT * FROM rooms");
        while ($r = mysqli_fetch_assoc($rooms)) {
            $sel = ($r['room_id'] == $row['room_id']) ? "selected" : "";
            echo "<option value='{$r['room_id']}' $sel>{$r['room_number']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Day of Week</label>
    <select class="form-control mb-3" name="day" required>
        <?php
        $days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
        foreach ($days as $d) {
            $sel = ($row['day_of_week'] == $d) ? "selected" : "";
            echo "<option value='$d' $sel>$d</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Time Slot</label>
    <select class="form-control mb-3" name="time" required>
        <option <?= ($row['time_slot']=="9AM-11AM")?"selected":""; ?>>9AM-11AM</option>
        <option <?= ($row['time_slot']=="11AM-1PM")?"selected":""; ?>>11AM-1PM</option>
        <option <?= ($row['time_slot']=="2PM-4PM")?"selected":""; ?>>2PM-4PM</option>
        <option <?= ($row['time_slot']=="4PM-6PM")?"selected":""; ?>>4PM-6PM</option>
    </select>

    <button name="update" class="btn btn-primary">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE timetable SET
        course_id = '{$_POST['course_id']}',
        faculty_id = '{$_POST['faculty_id']}',
        room_id = '{$_POST['room_id']}',
        day_of_week = '{$_POST['day']}',
        time_slot = '{$_POST['time']}'
        WHERE tt_id = $id");

    echo "<script>alert('Timetable updated successfully!');window.location='list.php';</script>";
}
?>

<?php include "../footer.php"; ?>
