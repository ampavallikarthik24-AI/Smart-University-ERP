<?php include "../header.php"; ?>

<?php
$course_id = $_POST['course_id'];
$exam_id = $_POST['exam_id'];

$exam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM exams WHERE exam_id = $exam_id"));

$students = mysqli_query($conn, "
    SELECT s.student_id, s.student_name
    FROM students s
    JOIN enrollment e ON s.student_id = e.student_id
    WHERE e.course_id = $course_id
    ORDER BY s.student_name ASC
");
?>

<h2 class="fw-bold mb-4"><i class="bi bi-pencil"></i> Enter Marks (<?= $exam['exam_type']; ?>)</h2>

<form method="POST" action="save.php">
    <input type="hidden" name="exam_id" value="<?= $exam_id; ?>">

    <table class="table table-bordered align-middle">
        <thead class="table-secondary text-center">
            <tr><th>Student</th><th>Marks (out of <?= $exam['max_marks']; ?>)</th></tr>
        </thead>
        <tbody>
        <?php while ($s = mysqli_fetch_assoc($students)): ?>
        <tr>
            <td class="text-start"><?= $s['student_name']; ?></td>
            <td>
                <input type="number" class="form-control" name="marks[<?= $s['student_id']; ?>]"
                       min="0" max="<?= $exam['max_marks']; ?>" required>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <button class="btn btn-success">Save Results</button>
</form>

<?php include "../footer.php"; ?>
