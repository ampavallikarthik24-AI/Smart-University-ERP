<?php include "../header.php"; ?>

<h2 class="fw-bold mb-4"><i class="bi bi-calendar-week"></i> Timetable</h2>

<a href="add.php" class="btn btn-success mb-3">+ Add Timetable Entry</a>

<?php
$query = "
SELECT t.tt_id, c.course_name, f.faculty_name, r.room_number, 
       t.day_of_week, t.time_slot
FROM timetable t
JOIN courses c ON t.course_id = c.course_id
JOIN faculty f ON t.faculty_id = f.faculty_id
JOIN rooms r ON t.room_id = r.room_id
ORDER BY FIELD(day_of_week,'Mon','Tue','Wed','Thu','Fri','Sat','Sun'), time_slot ASC
";
$res = mysqli_query($conn, $query);
?>

<table class="table table-bordered table-hover align-middle">
<thead class="table-primary">
<tr>
    <th>ID</th>
    <th>Course</th>
    <th>Faculty</th>
    <th>Room</th>
    <th>Day</th>
    <th>Time Slot</th>
    <th style="width: 160px;">Actions</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($res)): ?>
<tr>
    <td><?= $row['tt_id']; ?></td>
    <td><?= $row['course_name']; ?></td>
    <td><?= $row['faculty_name']; ?></td>
    <td><?= $row['room_number']; ?></td>
    <td><?= $row['day_of_week']; ?></td>
    <td><?= $row['time_slot']; ?></td>
    <td>
        <a href="edit.php?id=<?= $row['tt_id']; ?>" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <a href="delete.php?id=<?= $row['tt_id']; ?>" 
           onclick="return confirm('Delete this timetable entry?');"
           class="btn btn-danger btn-sm">
           <i class="bi bi-trash3"></i> Delete
        </a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<?php include "../footer.php"; ?>
