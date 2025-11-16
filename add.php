<?php include "../header.php"; ?>

<h2 class="fw-bold mb-4"><i class="bi bi-plus-circle"></i> Add Timetable Entry</h2>

<form method="POST" class="w-50">

    <label class="fw-semibold">Course</label>
    <select class="form-control mb-3" name="course_id" required>
        <option value="">Select Course</option>
        <?php
        $courses = mysqli_query($conn, "SELECT * FROM courses ORDER BY course_name ASC");
        while ($c = mysqli_fetch_assoc($courses)) {
            echo "<option value='{$c['course_id']}'>{$c['course_name']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Faculty</label>
    <select class="form-control mb-3" name="faculty_id" required>
        <option value="">Select Faculty</option>
        <?php
        $faculty = mysqli_query($conn, "SELECT * FROM faculty ORDER BY faculty_name ASC");
        while ($f = mysqli_fetch_assoc($faculty)) {
            echo "<option value='{$f['faculty_id']}'>{$f['faculty_name']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Room</label>
    <select class="form-control mb-3" name="room_id" required>
        <option value="">Select Room</option>
        <?php
        $rooms = mysqli_query($conn, "SELECT * FROM rooms ORDER BY room_number ASC");
        while ($r = mysqli_fetch_assoc($rooms)) {
            echo "<option value='{$r['room_id']}'>{$r['room_number']}</option>";
        }
        ?>
    </select>

    <label class="fw-semibold">Day of Week</label>
    <select class="form-control mb-3" name="day" required>
        <option value="">Select Day</option>
        <option value="Mon">Mon</option>
        <option value="Tue">Tue</option>
        <option value="Wed">Wed</option>
        <option value="Thu">Thu</option>
        <option value="Fri">Fri</option>
        <option value="Sat">Sat</option>
        <option value="Sun">Sun</option>
    </select>

    <label class="fw-semibold">Time Slot</label>
    <select class="form-control mb-3" name="time" required>
        <option value="">Select Time Slot</option>
        <option>9AM-11AM</option>
        <option>11AM-1PM</option>
        <option>2PM-4PM</option>
        <option>4PM-6PM</option>
        <option>6PM-8PM</option>
        <option>8PM-10PM</option>
    </select>

    <button name="submit" class="btn btn-success">Save Timetable Entry</button>
</form>

<?php
if (isset($_POST['submit'])) {
    mysqli_query($conn, "INSERT INTO timetable(course_id, faculty_id, room_id, day_of_week, time_slot)
    VALUES('{$_POST['course_id']}', '{$_POST['faculty_id']}', '{$_POST['room_id']}', '{$_POST['day']}', '{$_POST['time']}')");
    echo "<script>alert('Timetable entry added successfully!');window.location='list.php';</script>";
}
?>

<?php include "../footer.php"; ?>
