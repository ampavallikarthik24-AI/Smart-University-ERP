<?php ob_start(); include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Smart University ERP</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #e9f1ff;
    font-family: 'Poppins', sans-serif;
}
.navbar-custom {
    background: linear-gradient(90deg, #001c39, #004aad);
}
.nav-link {
    font-weight: 500;
    margin-right: 18px;
}
.nav-link:hover {
    opacity: 0.8;
}
.module-btn {
    font-size: 17px;
    font-weight: 600;
    padding: 12px 28px;
}
.dashboard-card {
    transition: 0.3s;
}
.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 18px rgba(0, 0, 0, 0.25);
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom navbar-dark px-4 py-3">
    <a class="navbar-brand fw-bold text-white fs-4">
        <i class="bi bi-mortarboard-fill"></i> Smart University ERP
    </a>

    <div class="collapse navbar-collapse ms-4">
        <a href="/smart_university_erp/index.php" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="/smart_university_erp/students/list.php" class="nav-link text-white"><i class="bi bi-people-fill"></i> Students</a>
        <a href="/smart_university_erp/faculty/list.php" class="nav-link text-white"><i class="bi bi-person-badge"></i> Faculty</a>
        <a href="/smart_university_erp/courses/list.php" class="nav-link text-white"><i class="bi bi-journal"></i> Courses</a>
        <a href="/smart_university_erp/timetable/list.php" class="nav-link text-white"><i class="bi bi-calendar-week"></i> Timetable</a>
        <a href="/smart_university_erp/attendance/list.php" class="nav-link text-white"><i class="bi bi-clipboard-check"></i> Attendance</a>
        <a href="/smart_university_erp/exams/list.php" class="nav-link text-white"><i class="bi bi-file-earmark-bar-graph"></i> Exams</a>
        <a href="/smart_university_erp/exam_results/list.php" class="nav-link text-white"><i class="bi bi-clipboard-data"></i> Exam Results</a>
        <a href="/smart_university_erp/room_booking/list.php" class="nav-link text-white"><i class="bi bi-door-open-fill"></i> Room Booking</a>
        <a href="/smart_university_erp/reports/index.php" class="nav-link text-white"><i class="bi bi-graph-up-arrow"></i> Reports</a>
    </div>

    <a href="/smart_university_erp/index.php" class="btn btn-light fw-bold px-3 py-2">
        <i class="bi bi-house-door"></i> Home
    </a>
</nav>

<div class="container mt-5">
