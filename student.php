<?php include "../header.php"; ?>

<?php
$student_id = $_GET['id'];

$student = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT s.*, p.program_name, d.dept_name
    FROM students s
    JOIN programs p ON s.program_id = p.program_id
    JOIN departments d ON s.dept_id = d.dept_id
    WHERE s.student_id = $student_id
"));

$name = $student['student_name'];
?>

<h2 class="fw-bold mb-4">
    <i class="bi bi-person-lines-fill"></i> <?= $name ?> — Performance Report
</h2>

<div class="p-4 bg-white rounded shadow-sm mb-4">
    <h5 class="fw-bold mb-3">Student Details</h5>
    <p><strong>Roll No:</strong> <?= $student['roll_no'] ?></p>
    <p><strong>Email:</strong> <?= $student['email'] ?></p>
    <p><strong>Program:</strong> <?= $student['program_name'] ?></p>
    <p><strong>Department:</strong> <?= $student['dept_name'] ?></p>
</div>

<!-- Attendance Summary -->
<?php
$total = mysqli_fetch_row(mysqli_query($conn,"
    SELECT COUNT(*) FROM attendance WHERE student_id = $student_id
"))[0];

$present = mysqli_fetch_row(mysqli_query($conn,"
    SELECT COUNT(*) FROM attendance WHERE student_id = $student_id AND status='Present'
"))[0];

$absent = mysqli_fetch_row(mysqli_query($conn,"
    SELECT COUNT(*) FROM attendance WHERE student_id = $student_id AND status='Absent'
"))[0];

$late = mysqli_fetch_row(mysqli_query($conn,"
    SELECT COUNT(*) FROM attendance WHERE student_id = $student_id AND status='Late'
"))[0];

$attendance_percent = $total ? round(($present / $total) * 100, 2) : 0;
?>

<div class="p-4 bg-white rounded shadow-sm mb-4">
    <h5 class="fw-bold mb-3">Attendance Summary</h5>
    <p><strong>Total Classes:</strong> <?= $total ?></p>
    <p><strong>Present:</strong> <?= $present ?> | <strong>Absent:</strong> <?= $absent ?> | <strong>Late:</strong> <?= $late ?></p>
    <p><strong>Attendance %:</strong> <?= $attendance_percent ?>%</p>
    <?php
    $color = $attendance_percent >= 80 ? "success" : ($attendance_percent >= 60 ? "warning" : "danger");
    ?>
    <span class="badge bg-<?= $color ?> p-2 fs-6">Attendance: <?= $attendance_percent ?>%</span>
</div>

<!-- Exam Results -->
<div class="p-4 bg-white rounded shadow-sm mb-4">
    <h5 class="fw-bold mb-3">Exam Results</h5>

    <?php
    $results = mysqli_query($conn,"
        SELECT c.course_name, r.marks_obtained, e.max_marks
        FROM exam_results r
        JOIN exams e ON r.exam_id = e.exam_id
        JOIN courses c ON e.course_id = c.course_id
        WHERE r.student_id = $student_id
        ORDER BY c.course_name ASC
    ");

    $labels = [];
    $marks = [];
    $maxes = [];

    while ($r = mysqli_fetch_assoc($results)) {
        $labels[] = $r['course_name'];
        $marks[] = $r['marks_obtained'];
        $maxes[] = $r['max_marks'];
    }
    ?>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-primary">
            <tr>
                <th>Course</th>
                <th>Marks</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
        <?php
        mysqli_data_seek($results, 0);
        while ($r = mysqli_fetch_assoc($results)):
            $p = ($r['marks_obtained'] / $r['max_marks']) * 100;
            if ($p >= 90) $grade = "A+";
            else if ($p >= 80) $grade = "A";
            else if ($p >= 70) $grade = "B";
            else if ($p >= 60) $grade = "C";
            else if ($p >= 50) $grade = "D";
            else $grade = "F";
        ?>
        <tr>
            <td><?= $r['course_name']; ?></td>
            <td><?= $r['marks_obtained'] . " / " . $r['max_marks']; ?></td>
            <td><span class="badge bg-dark"><?= $grade ?></span></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="p-4 bg-white rounded shadow-sm mb-4">
    <h5 class="fw-bold mb-3">Performance Chart</h5>
    <canvas id="marksChart"></canvas>
</div>

<script>
new Chart(document.getElementById('marksChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Marks',
            data: <?= json_encode($marks) ?>,
            backgroundColor: '#007bff'
        }]
    }
});
</script>

<?php include "../footer.php"; ?>
